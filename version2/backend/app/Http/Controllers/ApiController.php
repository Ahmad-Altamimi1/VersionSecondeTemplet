<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\groups;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Videos;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /////////////////////////////////////////////Start Posts Api///////////////////////////////////////////////////////

    public function Posts()
    {
        $posts = Post::with(['tag', 'group', 'tags'])->get();

        return response()->json(['posts' => $posts], 200);
    }
    public function LastPosts()
    {
        $posts = Post::with(['tag', 'group', 'tags'])->Limit(4)->get();

        return response()->json(['posts' => $posts], 200);
    }
    public function PopularPosts()
    {
        $PopularPosts = Post::with(['tag', 'group', 'tags'])->Orderby('REED', 'desc')->Limit(6)->get();

        return response()->json(['PopularPosts' => $PopularPosts], 200);
    }
    public function SinglePost($PostName)
    {
        $Singlepost = Post::where('TITLE', '=', $PostName)->with(['tag', 'group', 'tags', 'tag.mainposts', 'tags.posts'])->first();

        return response()->json(['Singlepost' => $Singlepost], 200);
    }


    /////////////////////////////////////////////End Posts Api///////////////////////////////////////////////////////

    /////////////////////////////////////////////Start Videos Api///////////////////////////////////////////////////////

    public function PopularVideos()
    {
        $PopularVideos = Videos::with(['tag', 'group', 'tags'])->Orderby('REED', 'desc')->Limit(6)->get();

        return response()->json(['PopularVideos' => $PopularVideos], 200);
    }
    /////////////////////////////////////////////End Videos Api///////////////////////////////////////////////////////

    /////////////////////////////////////////////start tags Api///////////////////////////////////////////////////////

    public function tags()
    {
        $tags = Tag::with(['posts', 'groups', 'videos', 'posts.tag'])->limit(3)->get();

        return response()->json(['tags' => $tags], 200);
    }
    public function testtag()
    {
        $tags = Tag::with(['posts', 'groups', 'videos', 'posts.tag'])->limit(3)->get();
        return response()->json(['tags' => $tags], 200);
    }
    public function Tabstags()
    {
        $tags = Tag::with(['posts' => function ($query) {
            $query->take(10);
        }, 'videos', 'posts.tag'])->where('order', '=', 0)->limit(6)->get();
        return response()->json(['tags' => $tags], 200);
    }

    public function maintags()
    {
        $maintags = Tag::where('parentId', '=', null)->with(['posts', 'groups', 'videos', 'posts.tag', 'children'])->limit(30)->get();

        return response()->json(['maintags' => $maintags], 200);
    }
    public function sprecialtag()
    {
        $sprecialtagarry =  [];
        $maintags = Tag::where('parentId', '=', null)->with(['posts', 'groups', 'videos', 'posts.tag', 'children', 'children.children'])->limit(30)->get();

        return response()->json(['maintags' => $maintags], 200);
    }


    public function SingleTag($TagName)
    {
        $SingleTag = Tag::where('TITLE', '=', $TagName)->with(['posts', 'groups', 'videos', 'posts.tag', 'children', 'groups.tags'])->first();

        return response()->json(['SingleTag' => $SingleTag], 200);
    }

    public function TagbasedinOrder($TagName)
    {
        $SingleTag = Tag::where('TITLE', '=', $TagName)->with(['posts', 'groups', 'videos', 'posts.tag', 'children', 'groups.tags'])->first();

        return response()->json(['SingleTag' => $SingleTag], 200);
    }
    public function childtags($id)
    {
        $childtags = Tag::find($id)->first();
        $children = Tag::where('parentId', '=', $id)->get();
        return response()->json(['childtags' => $childtags, 'children' => $children], 200);
    }
    /////////////////////////////////////////////End tags Api///////////////////////////////////////////////////////


    /////////////////////////////////////////////start Group  Api///////////////////////////////////////////////////////
    public function groups()
    {
        $groups = groups::with(['posts', 'tags', 'videos', 'posts.tag'])->limit(30)->get();

        return response()->json(['groups' => $groups], 200);
    }

    public function SingleGroup($GroupName)
    {
        $SingleGroup = groups::where('TITLE', '=', $GroupName)->with(['posts', 'tags', 'videos', 'posts.tag', 'tags.posts'])->first();

        return response()->json(['SingleGroup' => $SingleGroup], 200);
    }


    public function SingleSubTag($subtagName)
    {
        $subtag = Tag::where('TITLE', '=', $subtagName)->with(['groups', 'videos', 'posts.tag', 'children', 'children.posts',])->first();

        return response()->json(['subtag' => $subtag], 200);
    }
    /////////////////////////////////////////////End Group Api///////////////////////////////////////////////////////
}
