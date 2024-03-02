<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use App\Models\groups;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $poststags = Tag::all();
                $posts = DB::table('posts')->get();
                $users = DB::table('users')->get();
                $groups = groups::all();
                return view('webcontrol.tags', ['poststags' => $poststags, 'groups' => $groups, 'users' => $users, 'posts' => $posts]);
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
            if (Auth::user()->admin || Auth::user()->B0) {
                $tags = Tag::all();
                $users = DB::table('users')->get();
                return view('webcontrol.addtags', ['tags' => $tags, 'users' => $users]);
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
        // dd($request);
        $data = $request->validate([
            'tital' => 'required',
            'description' => 'required',
            'IMG' => 'required|image',
        ]);

        $saveddata = new Tag;
        $saveddata->TITLE = request('tital');
        $saveddata->DESCRIPTION = request('description');
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->COLOR = request('COLOR');
        $saveddata->FACEBOOK = request('FACEBOOK');
        $saveddata->YOUTUBE = request('YOUTUBE');
        $saveddata->TWITTER = request('TWITTER');
        $saveddata->INSTAGRAM = request('INSTAGRAM');
        $saveddata->IMG = request('IMG')->store('uploads', 'public');
        $saveddata->TEXT = request('TEXT');
        $saveddata->REED = 0;
        $saveddata->save();

        return redirect("tags");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0) {
                $poststag = Tag::find($tag->id);
                return view('webcontrol.edittag', ['poststag' => $poststag]);
            } else return view('welcome');
        } else  return "You can't access here!";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {

        if (request('IMG')) {
            $data = request()->validate([
                'tital' => 'required',
                'description' => 'required',
                'IMG' => 'required|image',
            ]);
        } else {
            $data = request()->validate([
                'tital' => 'required',
                'description' => 'required',
            ]);
        }

        $tag->TITLE = request('tital');
        $tag->DESCRIPTION = request('description');
        $tag->EDITOR = Auth::user()->id;
        $tag->COLOR = request('COLOR');
        $tag->TEXT = request('TEXT');
        $tag->FACEBOOK = request('FACEBOOK');
        $tag->YOUTUBE = request('YOUTUBE');
        $tag->TWITTER = request('TWITTER');
        $tag->INSTAGRAM = request('INSTAGRAM');
        if (request('IMG')) {
            $tag->IMG = request('IMG')->store('uploads', 'public');
        }

        $tag->update();

        return redirect("tags");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        File::delete("storage/" . $tag->IMG);
        $tag->delete();
        return redirect('tags');
    }
}
