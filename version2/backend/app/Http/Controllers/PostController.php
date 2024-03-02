<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;    
use App\Models\poststags;
use App\Models\groups;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;


class PostController extends Controller
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
                $poststags = DB::table('poststags')->get();
                $posts = Post::orderBy('id', 'DESC')->get();

                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();
                return view('webcontrol.posts.posts', ['poststags' => $poststags, 'groups' => $groups, 'posts' => $posts, 'users' => $users]);
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
                $poststags = DB::table('poststags')->get();
                $users = DB::table('users')->get();
                $groups = groups::all();
                return view('webcontrol.posts.postcreate', ['poststags' => $poststags, 'users' => $users, 'groups' => $groups]);
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
        
        $data = $request->validate([
            'TITLE' => 'required',
            'TOPIC' => 'required',
            'TEXT' => 'required',
            'DATE_SCHEDULER' => 'required',
            'DESCRIPTION' => 'required',
            'IMG' => 'required|image',
        ]);



        $saveddata = new Post;
        $saveddata->PIC_Name = $request->PIC_Name;
        $saveddata->TITLE = $request->TITLE;
        $saveddata->DESCRIPTION = $request->DESCRIPTION;
        $saveddata->TEXT1 = $request->TEXT;
        $topicandtag=explode(',',$request->TOPIC);
        $saveddata->groupId = $topicandtag[0];
        $saveddata->tagId = $topicandtag[1];
        $saveddata->REFERENCES = $request->REFERENCES;
        $saveddata->DATE_SCHEDULER =$request->DATE_SCHEDULER;
        $imageName = time().'.'.$request->IMG->extension();
        $request->IMG->move(public_path('uploads'), $imageName);
        $saveddata->Main_IMG = 'uploads/' . $imageName;
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->REED = 0;
        $saveddata->save();
 

foreach (groups::find($topicandtag[0])->tags as  $tag) {
    $poststag= New poststags;
    $poststag->postId=$saveddata->id;
    $poststag->tagId=$tag->id;
    $poststag->save();
};
        return redirect("posts");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
                $post = DB::table('posts')->where('id', $id)->first();
                $poststags = DB::table('poststags')->get();
                $groups =groups::all();
                return view('webcontrol.posts.editposts', ['groups' => $groups, 'poststags' => $poststags, 'post' => $post]);
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
    public function update(Request $request, Post $post)
    {
        // Remove the line: $post=$id;
        if ($request->input('IMG')) {
            $data = $request->validate([
                'TITLE' => 'required',
                'TOPIC' => 'required',
                'TEXT' => 'required',
                'DATE_SCHEDULER' => 'required',
                'DESCRIPTION' => 'required',
                'IMG' => 'image',
                'PicName' => 'required',
            ]);
        } 
        
        $post->TITLE = $request->input('TITLE');
        $post->PIC_Name = $request->input('PicName');
        $post->DESCRIPTION = $request->input('DESCRIPTION');
        $post->TEXT1 = $request->input('TEXT');
        $topicandtag = explode(',', $request->input('TOPIC'));
        $post->groupId = $topicandtag[0];
        $post->tagId = $topicandtag[1];
        $post->REFERENCES = $request->input('REFERENCES');
        $post->DATE_SCHEDULER = $request->input('DATE_SCHEDULER');
        $post->EDITOR = Auth::user()->id;
    
        if ($request->hasFile('IMG') && $request->file('IMG')->isValid()) {
            if (!empty($post->Main_IMG)) {
                $previousImagePath = public_path($post->Main_IMG);
                if (File::exists($previousImagePath)) {
                    File::delete($previousImagePath);
                }
            }
        
            $imageName = time() . '.' . $request->IMG->extension();
            $request->IMG->move(public_path('uploads'), $imageName);
            $post->Main_IMG = 'uploads/' . $imageName;
        }
    
     
        poststags::where('postId', $post->id)->delete();
    

        foreach (groups::find($topicandtag[0])->tags as $tag) {
            $poststag = new poststags;
            $poststag->postId = $post->id;
            $poststag->tagId = $tag->id;
            $poststag->save();
        }
    
        // Save the changes to the post
        $post->save();
    
        return redirect("posts");
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        File::delete("storage/" . $post->IMG);
        $post->delete();
        poststags::where('postId', $post->id)->delete();
        return redirect("posts");
    }
}
