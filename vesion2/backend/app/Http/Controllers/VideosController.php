<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\pictures;
use App\Models\poststags;
use App\Models\Tag;
use App\Models\Videos;
use App\Models\GroupsTag;
use App\Models\Poststag;
use App\Models\programs;
use App\Models\Videosgroup;
use App\Models\programsvideos;
use App\Models\groups;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Rules\YouTubeUrl;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class VideosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $poststags = Tag::all();
                $videos = Videos::all();
                $users = DB::table('users')->get();
                $groups = groups::all();
                return view('webcontrol.videos.videos', ['poststags' => $poststags, 'videos' => $videos, 'users' => $users, 'groups' => $groups]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $tags = Tag::all();
                $users = DB::table('users')->get();
                $groups = groups::all();
                return view('webcontrol.videos.videocreate', ['tags' => $tags, 'users' => $users, 'groups' => $groups]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'TITLE' => 'required',
            'TOPIC' => 'required',
            'TEXT' => 'required',
            'DATE_SCHEDULER' => 'required',
            'DESCRIPTION' => 'required',
            'IMG' => 'required|image',
            'VID' => ['required', new YouTubeUrl]
        ]);

        parse_str(parse_url(request('VID'), PHP_URL_QUERY), $my_array_of_vars);
        $video = $my_array_of_vars['v'];


        $saveddata = new Videos;
        $saveddata->TITLE = request('TITLE');
        $saveddata->VID = $video;
        $topicandtag = explode(',', request('TOPIC'));
        $saveddata->groupId = $topicandtag[0];
        $saveddata->tagId = $topicandtag[1];
        $saveddata->DESCRIPTION = request('DESCRIPTION');
        $saveddata->TEXT1 = request('TEXT');
        $saveddata->DATE_SCHEDULER = request('DATE_SCHEDULER');
        $saveddata->TEXT2 = 0;
        $saveddata->TEXT3 = 0;
        $imageName = time() . '.' . $request->IMG->extension();
        $request->IMG->move(public_path('uploads'), $imageName);
        $saveddata->IMG = 'uploads/' . $imageName;
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->REED = 0;
        $saveddata->save();
        foreach (groups::find($topicandtag[0])->tags as  $tag) {
            $poststag = new Videosgroup;
            $poststag->videoId = $saveddata->id;
            $poststag->tagId = $tag->id;
            $poststag->save();
        };
        return redirect("videos");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1) {
                $video = Videos::find($id);
                $tags = Tag::all();
                $groups = groups::all();

                return view('webcontrol.videos.editvideos', ['groups' => $groups, 'tags' => $tags, 'video' => $video]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videos $id)

    {

        $samevideo = Videos::findOrfail($id);
        request()->validate([
            'TITLE' => 'required',
            'TOPIC' => 'required',
            // 'TAG' => 'required',
            'TEXT' => 'required',
            'DESCRIPTION' => 'required',
            'DATE_SCHEDULER' => 'required',
            'VID' => ['required', new YouTubeUrl]
        ]);

        parse_str(parse_url(request('VID'), PHP_URL_QUERY), $my_array_of_vars);
        $video = $my_array_of_vars['v'];

        $samevideo->TITLE = request('TITLE');
        $topicandtag = explode(',', request('TOPIC'));

        $samevideo->groupId = $topicandtag[0];
        $samevideo->tagId = $topicandtag[1];


        $samevideo->DATE_SCHEDULER = request('DATE_SCHEDULER');
        $samevideo->EDITOR = Auth::user()->id;
        $samevideo->VID = $video;
        $samevideo->DESCRIPTION = request('DESCRIPTION');
        $samevideo->TEXT1 = request('TEXT');
        if ($request->hasFile('IMG') && $request->file('IMG')->isValid()) {
            if (!empty($samevideo->IMG)) {
                $previousImagePath = public_path($samevideo->IMG);
                if (File::exists($previousImagePath)) {
                    File::delete($previousImagePath);
                }
            }

            $imageName = time() . '.' . $request->IMG->extension();
            $request->IMG->move(public_path('uploads'), $imageName);
            $samevideo->IMG = 'uploads/' . $imageName;
        }



        $samevideo->update();




        foreach (Videosgroup::where('videoId', '=', $samevideo->id)->get() as $value) {
            $value->delete();
        }

        foreach (groups::find($topicandtag[0])->tags as  $tag) {
            $poststag = new Videosgroup;
            $poststag->videoId = $samevideo->id;
            $poststag->tagId = $tag->id;
            $poststag->save();
        };
        return redirect("videos");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videos $video)
    {
        File::delete("storage/" . $video->IMG);
        $video->delete();
        return redirect("videos");
    }
}
