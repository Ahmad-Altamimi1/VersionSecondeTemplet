<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\poststags;
use App\Models\GroupsTag;
use App\Models\Tag;


use App\Models\groups;
class GroupsController extends Controller
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
                $poststags = DB::table('poststags')->get();
                $posts = DB::table('posts')->get();
                $users = DB::table('users')->get();
                $groups=groups::all();

                return view('webcontrol.groups.groups', ['poststags' => $poststags, 'users' => $users, 'groups' => $groups, 'posts' => $posts]);
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
                $users = DB::table('users')->get();
                $groups = DB::table('groups')->get();
                $poststags = DB::table('tags')->get();

                return view('webcontrol.groups.addgroups', ['groups' => $groups, 'users' => $users, 'poststags' => $poststags]);
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
            'tital' => 'required'
        ]);

    
        


        $saveddata = new groups;
        $saveddata->TITLE = request('tital');
        $saveddata->DESCRIPTION = request('description');
        $saveddata->WRITER = Auth::user()->id;
        $saveddata->EDITOR = Auth::user()->id;
        $saveddata->REED = 0;
        $saveddata->save();

        for ($i = 1; $i <= 10; $i++) {
            $tagId = intval(request('TOPIC' . $i));
         
            $parent = Tag::find($tagId);
            if ($parent) {
            
                $GroupsTag=NEW GroupsTag;
                $GroupsTag->tagId=$tagId;
                $GroupsTag->groupId=$saveddata->id;
                $GroupsTag->save();
            if ($i == 1) {
   
                $saveddata->update();
                $parent->parentId = null;
                $parent->update();
            } else {

                $previousTagId =  request('TOPIC' . ($i - 1));
                $parent->parentId =$previousTagId ; 
                $parent->update();
            }

        } 
    }

        return redirect("groups");
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
            if (Auth::user()->admin || Auth::user()->B0) {
                $group = groups::find($id);
                $tags = Tag::all();

                return view('webcontrol.groups.editgroups', ['group' => $group, 'tags' => $tags]);
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
    public function update(Request $request,groups $group)
    {
        $data = request()->validate([
            'tital' => 'required',
        ]);

      

        $group->TITLE = request('tital');
        $group->DESCRIPTION = request('description');
        $group->EDITOR = Auth::user()->id;
        $group->update();
        foreach (GroupsTag::where('groupId','=',$group->id)->get() as $key => $value) {
            $value->delete();
        }
        for ($i = 1; $i <= 10; $i++) {
            $tagId = intval(request('TOPIC' . $i));
            $parent = Tag::find($tagId);
            if ($parent) {
                
          
                $GroupsTag=NEW GroupsTag;
                $GroupsTag->tagId=$tagId;
                $GroupsTag->groupId=$group->id;
                $GroupsTag->save();
            if ($i == 1) {

                $parent->parentId = null;
                $parent->update();
            } else {
                $previousTagId =  request('TOPIC' . ($i - 1));
                $parent->parentId =$previousTagId ; 
                $parent->update();
            }

        } 
    }
    // dd($group->posts );
    if(isset($group->posts) && count($group->posts )>0){
   foreach ($group->posts as $post) {
    foreach (poststags::where('postId','=',$post->id)->get() as $value) {
        $value->delete();
    }
    foreach ($group->tags as  $tag) {
        $poststag= New poststags;
        $poststag->postId= $post->id;
        $poststag->tagId=$tag->id;
        $poststag->save();
    };
    
  
   }}elseif(isset($group->videos) && count($group->videos )>0){
    foreach ($group->videos as $video) {
     foreach (poststags::where('postId','=',$video->id)->get() as $value) {
         $value->delete();
     }
     foreach ($group->tags as  $tag) {
         $poststag= New poststags;
         $poststag->postId= $video->id;
         $poststag->tagId=$tag->id;
         $poststag->save();
     };
     
   
    }}
        return redirect("groups");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(groups $group)
    {
        $group->delete();
        return redirect("groups");
    }
}
