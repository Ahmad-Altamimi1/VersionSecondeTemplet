<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Videos;
use App\Models\groups;
use App\Models\Post;
use App\Models\poststags;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


function datearray($data)
{
    /// for date
    $datawithtile = [];
    $datenow = strtotime("-3:00");
    $today = date("Y-m-d H:i:s", $datenow);
    foreach ($data as $singledata) {
        if ($singledata->DATE_SCHEDULER <= $today) {
            $datawithtile[] = $singledata;
        }
    }
    return $datawithtile;
}

class webcontrol extends Controller
{


    public function index()
    {

        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "طبكم - tebkum",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/logo_sport.png')
        );

        $visitors = DB::table('visitors')->get();
        $posts = DB::table('posts')->get();
        $REED = 0;
        foreach ($posts as $post) {
            $REED = $REED +   $post->REED;
        }
        // dd($visitors);

        if (Auth::user()) {
            if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1 || Auth::user()->B2) {
                return view('dashboard', ['visitors' => $visitors, 'REED' => $REED]);
            } else return view('soon');
        } else  return "You can't access here!";
    }

    public function login()
    {
        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "طبكم - tebkum",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/Asset 1.png')
        );
        // dd($page);
        if (Auth::user()) {
            return redirect("/dashboard");
        } else  return view('public.login', ['page' => $page]);
    }

    public function register()
    {
        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "طبكم - tebkum",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/Asset 1.png')
        );
        if (Auth::user()) {
            return redirect("/dashboard");
        } else  return view('public.register', ['page' => $page]);
    }

    public function postbyid($id)
    {
        $post = Post::find($id);
        $posts = Post::all();
        $tags = DB::table('poststags')->get();
        $groups = DB::table('groups')->get();

        $postswithtime = [];

        DB::table("posts")->where('id',  $id)->increment('REED');
        DB::table("groups")->where('id',  $post->TOPIC)->increment('REED');
        foreach ($groups as $group) {
            if ($post->TOPIC == $group->id) {
                $string = $group->TAG;
                $str_arr = explode(',', $string);
                $str_arr = array_filter($str_arr);
                foreach ($str_arr as $str) {
                    DB::table("poststags")->where('id',  $str)->increment('REED');
                }
            }
        }



        $datenow = strtotime('-3:00');
        foreach ($posts as $singlepost) {
            if (strtotime($singlepost->DATE_SCHEDULER) <= $datenow) {
                $postswithtime[] = $singlepost;
            }
        }

        $page = array(
            "name" => $post->TITLE,
            "tital" => $post->TITLE,
            "description" => $post->DESCRIPTION,
            "url" => url('/') . '/posts/' . $post->id . '/show',
            "imgurl" => asset('storage/' . $post->IMG . '')
        );
        if (strtotime($post->DATE_SCHEDULER) <= $datenow) {
            return view('public.singlepost', ['page' => $page, 'groups' => $groups, 'post' => $post, 'posts' => $postswithtime, 'tags' => $tags]);
        } else {
            return view('welcome', ['page' => $page, 'groups' => $groups, 'post' => $post, 'posts' => $postswithtime, 'tags' => $tags]);
        }
    }


    public function groupbyid($id) {
        $group = groups::findorfail($id);
        $arry = explode(',', $group->TAG);
        $title = $arry[0];
        $mainTitle = [];
        $OtherTitle = [];
        $tagsinallgroups = "";

        foreach (groups::all() as $value) {
            $arry2 = explode(',', $value->TAG);

            if ($arry2[0] == $title) {
                if (count($arry2) > 0) {
                    if (isset($mainTitle[$arry2[1]])) {
                        if (is_array($mainTitle[$arry2[1]])) {


                        foreach (array_slice($arry2, 1) as $key => $rrr) {
                          if (!in_array($rrr,$mainTitle[$arry2[1]])) {
                            $mainTitle[$arry2[1]][] = $rrr;
                          }
                        }
                    }else{
                        $mainTitle[$arry2[1]][] =array_slice($arry2, 1);
                    }


                    }else{

                        $mainTitle[$arry2[1]] = array_slice($arry2, 1);
                    }
                }
                $tagsinallgroups .= $value->TAG;
            }
        }
        $page = array(
            "name" => $group->TITLE,
            "tital" => $group->TITLE,
            "description" => $group->DESCRIPTION,
            "url" => url('/') . '/group/' . $group->id . '/show',
            "imgurl" => asset('storage/' . $group->id . '')
        );
        $string = $tagsinallgroups . $group->TAG;

        $tagsId = explode(',', $string);
        $alltags = poststags::all();
        $tags = [];

        foreach ($alltags as $tag) {
            if (in_array($tag->id, $tagsId)) {
                $tags[] = $tag;
            };
        };
        $mainTitle = array_filter($mainTitle, function ($key) {
            return $key !== '';
        }, ARRAY_FILTER_USE_KEY);
$Main_Tag=poststags::find($title);
            return view("public.group", compact('tags', 'group','page','mainTitle','title','Main_Tag'));
    }






    public function groupsecbyid($id) {

        // $arry = explode(',', $group->TAG);
        $title = $id;
$Main_Tag=poststags::find($title);
// dd($Main_Tag);
        $mainTitle = [];
        $OtherTitle = [];
        $tagsinallgroups = "";

        foreach (groups::all() as $value) {
            $arry2 = explode(',', $value->TAG);

            if ($arry2[1] == $title) {
                $group=poststags::findOrfail($arry2[1]);
                $maingroup=poststags::findOrfail($arry2[0]);
                if (count($arry2) > 0) {
                    if (isset($mainTitle[$arry2[2]])) {
                        if (is_array($mainTitle[$arry2[2]])) {


                        foreach (array_slice($arry2, 2) as $key => $rrr) {
                          if (!in_array($rrr,$mainTitle[$arry2[2]])) {
                            $mainTitle[$arry2[2]][] = $rrr;
                          }
                        }
                    }else{
                        $mainTitle[$arry2[2]][] =array_slice($arry2, 2);
                    }


                    }else{

                        $mainTitle[$arry2[2]] = array_slice($arry2, 2);


                }


                $tagsinallgroups .= $value->TAG;
                            }
                               }
        }
        $filteredMainTitle = array_filter($mainTitle, function ($key) {
            return $key !== "";
        }, ARRAY_FILTER_USE_KEY);
        if (count($filteredMainTitle)==0) {
return redirect()->route('tagbyid', ['id' => $id]);
        }
        if (!($group && $maingroup)) {
            $group = groups::where('TAG', 'LIKE', '%' . $id . '%')->first();
            $maingroup= poststags::findOrfail(explode(',',$group->TAG)[0]);   # code...
        }
        $string = $tagsinallgroups . $group->TAG;

        $tagsId = explode(',', $string);
        $alltags = poststags::all();
        $tags = [];
        foreach ($alltags as $tag) {
            if (in_array($tag->id, $tagsId)) {
                $tags[] = $tag;

        }
        }
// dd($tagsinallgroups);

        $page = array(
            "name" => $group->TITLE,
            "tital" => $group->TITLE,
            "description" => $group->DESCRIPTION,
            "url" => url('/') . '/group/' . $group->id . '/show',
            "imgurl" => asset('storage/' . $group->id . '')
        );

            return view("public.secondegroup", compact('tags', 'group','page','mainTitle','maingroup','Main_Tag'));
    }





    public function videobyid($id)
    {
        $video = Videos::find($id);
        $videos = Videos::orderBy('id', 'DESC')->get();
        $users = DB::table('users')->get();
        $tags = DB::table('poststags')->get();
        $mostposts = DB::table('posts')->orderBy('REED', 'DESC')->get();
        $mostvideos = Videos::orderBy('REED', 'DESC')->get();
        DB::table("videos")->where('id',  $id)->increment('REED');
        DB::table("poststags")->where('id',  $video->TOPIC)->increment('REED');
        $videoTAGS=[];
        $CHECKVIDEO=[];
        $i=0;
foreach ($videos as $videoTAG) {
    if ($i<4) {


    if (!in_array($videoTAG->TAG,$CHECKVIDEO)) {
    $i++;
$CHECKVIDEO[]=$videoTAG->TAG;
    $videoTAGS[]=poststags::find($videoTAG->TAG);
}
}else{
    break;

}
}
        $page = array(
            "name" => $video->TITLE,
            "tital" => $video->TITLE,
            "description" => $video->DESCRIPTION,
            "url" => url('/') . '/videos/' . $video->id . '/show',
            "imgurl" => asset('storage/' . $video->IMG . '')
        );
        return view('public.singlevideo', ['page' => $page, 'mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'video' => $video, 'videos' => $videos, 'users' => $users, 'tags' => $tags, 'videoTAGS' => $videoTAGS]);
    }

    public function videosshow()
    {

        $videos = Videos::orderBy('id', 'DESC')->get();
        $users = DB::table('users')->get();
        $tags = DB::table('poststags')->get();
        $mostposts = DB::table('posts')->orderBy('REED', 'DESC')->get();
        $mostvideos = Videos::orderBy('REED', 'DESC')->get();

        $page = array(
            "name" => "الفيديوهات",
            "tital" => "الفيديوهات",
            "description" => "الفيديوهات",
            "url" => url('/') . '/videos/show',
            "imgurl" => asset('img/logo_sport.png')
        );
        return view('public.videos', ['page' => $page, 'mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'videos' => $videos, 'users' => $users, 'tags' => $tags]);
    }

    public function videosshownum($id)
    {

        $videos = Videos::orderBy('id', 'DESC')->get();
        $users = DB::table('users')->get();
        $tags = DB::table('poststags')->get();
        $mostposts = DB::table('posts')->orderBy('REED', 'DESC')->get();
        $mostvideos = Videos::orderBy('REED', 'DESC')->get();
        $num = $id;

        $page = array(
            "name" => "الفيديوهات",
            "tital" => "الفيديوهات",
            "description" => "الفيديوهات",
            "url" => url('/') . '/videos/show',
            "imgurl" => asset('img/logo_sport.png')
        );
        return view('public.videos', ['page' => $page, 'num' => $num, 'mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'videos' => $videos, 'users' => $users, 'tags' => $tags]);
    }

    public function tagbyid($id)
    {
        $tagbyid = poststags::find($id);
        $tags = poststags::all();
        $allgroups = groups::all();
        $groupnew = [];
        $slicedArray = [];
        $otherIds = [];

        foreach ($allgroups as $value) {
            $grouptag = $value->TAG;
            $grouparray = explode(',', $grouptag);

            if (in_array($id, $grouparray)) {
                $groupnew[] = $value;
            }
        }

        foreach ($groupnew as $group) {
            $grouptags = $group->TAG;
            $grouparrays = explode(',', $grouptags);

            $tagIndices = array_keys($grouparrays, $id);

            foreach ($tagIndices as $index) {
                $slicedArray = array_merge($slicedArray, array_slice($grouparrays, $index));
            }

            $otherIds = array_diff($grouparrays, $slicedArray);
        }

        // Extract post IDs from the TAG column in groups
        $postIdsInTag = Post::whereIn("TAG", $slicedArray)->pluck('id')->toArray();

        // Get posts associated with the tag
        $postintag = Post::whereIn("id", $postIdsInTag)->orderBy('id', 'asc')->get();

        $sortingOption = request('sort');
        $pageid = $id;

        // Assuming you want to get the first post as the popular post
        $popularpost = Post::where("TAG", "=", $id)->orderBy('SHOW', 'asc')->first();

        $page = [
            "name" => $tagbyid->TITLE,
            "tital" => $tagbyid->TITLE,
            "description" => $tagbyid->DESCRIPTION,
            "url" => url('/tags/' . $tagbyid->id . '/show'),
            "imgurl" => asset('storage/' . $tagbyid->IMG)
        ];

        $nm = 1;
        $wordCount = count($postintag);

        return view('public.tags', compact('postintag', 'pageid', 'popularpost', 'tags', 'tagbyid', 'otherIds', 'page', 'nm', 'wordCount'));
    }




// hello  here is for video

public function videotags($id)
{
    $tagbyid = poststags::find($id);
    $tags = poststags::all();
    $allgroups = groups::all();
    $groupnew = [];
    $slicedArray = [];
    $otherIds = [];

    foreach ($allgroups as $value) {
        $grouptag = $value->TAG;
        $grouparray = explode(',', $grouptag);

        if (in_array($id, $grouparray)) {
            $groupnew[] = $value;
        }
    }

    foreach ($groupnew as $group) {
        $grouptags = $group->TAG;
        $grouparrays = explode(',', $grouptags);

        $tagIndices = array_keys($grouparrays, $id);

        foreach ($tagIndices as $index) {
            $slicedArray = array_merge($slicedArray, array_slice($grouparrays, $index));
        }

        $otherIds = array_diff($grouparrays, $slicedArray);
    }

    // Extract post IDs from the TAG column in groups
    $postIdsInTag = Videos::whereIn("TAG", $slicedArray)->pluck('id')->toArray();

    // Get posts associated with the tag
    $postintag = Videos::whereIn("id", $postIdsInTag)->orderBy('SHOW', 'asc')->get();

    $sortingOption = request('sort');
    $pageid = $id;

    // Assuming you want to get the first post as the popular post
    $popularpost = Videos::where("TAG", "=", $id)->orderBy('SHOW', 'asc')->first();

    $page = [
        "name" => $tagbyid->TITLE,
        "tital" => $tagbyid->TITLE,
        "description" => $tagbyid->DESCRIPTION,
        "url" => url('/tags/' . $tagbyid->id . '/show'),
        "imgurl" => asset('storage/' . $tagbyid->IMG)
    ];

    $nm = 1;
    $wordCount = count($postintag);

    return view('public.videosByTag', compact('postintag', 'pageid', 'popularpost', 'tags', 'tagbyid', 'otherIds', 'page', 'nm', 'wordCount'));
}


    public function tagbyidnum($id, $nm)
    {
        $tagbyid = poststags::find($id);
        $tags = poststags::all();
        $allgroups = groups::all();
        $groupnew = [];
        $slicedArray = [];
        $otherIds = [];

        foreach ($allgroups as $value) {
            $grouptag = $value->TAG;
            $grouparray = explode(',', $grouptag);

            if (in_array($id, $grouparray)) {
                $groupnew[] = $value;
            }
        }

        foreach ($groupnew as $group) {
            $grouptags = $group->TAG;
            $grouparrays = explode(',', $grouptags);

            $tagIndices = array_keys($grouparrays, $id);

            foreach ($tagIndices as $index) {
                $slicedArray = array_merge($slicedArray, array_slice($grouparrays, $index));
            }

            $otherIds = array_diff($grouparrays, $slicedArray);
        }

        // Extract post IDs from the TAG column in groups
        $postIdsInTag = Post::whereIn("TAG", $slicedArray)->pluck('id')->toArray();

        // Get posts associated with the tag
        $postintag = Post::whereIn("id", $postIdsInTag)->orderBy('SHOW', 'asc')->get();

        $sortingOption = request('sort');
        $pageid = $id;

        // Assuming you want to get the first post as the popular post
        $popularpost = Post::where("TAG", "=", $id)->orderBy('SHOW', 'asc')->first();

        $page = [
            "name" => $tagbyid->TITLE,
            "tital" => $tagbyid->TITLE,
            "description" => $tagbyid->DESCRIPTION,
            "url" => url('/tags/' . $tagbyid->id . '/show'),
            "imgurl" => asset('storage/' . $tagbyid->IMG)
        ];


    $nm = $nm;
    $wordCount = count($postintag) -(6*$nm );
    return view('public.tags', compact('postintag', 'pageid', 'popularpost', 'tags','tagbyid','otherIds','page','nm','wordCount'));

    }

    public function aboutus()
    {
        $mostposts = DB::table('posts')->orderBy('REED', 'DESC')->get();
        $mostvideos = Videos::orderBy('REED', 'DESC')->get();
        $tags=poststags::all();
        $page = array(
            "name" => "من نحن",
            "tital" => "من نحن",
            "description" => "من نحن",
            "url" => url('/"aboutus"'),
            "imgurl" => asset('img/logo_sport.png')
        );

        return view('public.aboutus', ['mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'page' => $page, 'tags' => $tags]);
    }

    public function contactus()
    {
        $tags=poststags::all();


        $page = array(
            "name" => "تواصل معنا",
            "tital" => "تواصل معنا",
            "description" => "تواصل معنا",
            "url" => url('/"contactus"'),
            "imgurl" => asset('img/logo_sport.png')
        );

        return view('public.contactus', ['page' => $page, 'tags' => $tags]);
    }
    public function policy()
    {
        $tags=poststags::all();
        $page = array(
            "name" => " سياسة استخدام الموقع",
            "tital" => " سياسة استخدام الموقع",
            "description" => "سياسة استخدام الموقع ",
            "url" => url('/"policy"'),
            "imgurl" => asset('img/logo_sport.png')
        );

        return view('public.policy',  ['page' => $page, 'tags' => $tags]);
    }
    public function privacy()
    {
        $tags=poststags::all();
        $page = array(
            "name" => "سياسة الخصوصية",
            "tital" => "سياسة الخصوصية",
            "description" => "سياسة الخصوصية",
            "url" => url('/"privacy"'),
            "imgurl" => asset('img/logo_sport.png')
        );

        return view('public.privacy',  ['page' => $page, 'tags' => $tags]);
    }
    public function Intellectual_property_rights()
    {
        $tags=poststags::all();
        $page = array(
            "name" => "سياسة حقوق الملكية الفكرية
            ",
            "tital" => " سياسة حقوق الملكية الفكرية
            ",
            "description" => " سياسة حقوق الملكية الفكرية
            ",
            "url" => url('/"Intellectual_property_rights"'),
            "imgurl" => asset('img/logo_sport.png')
        );

        return view('public.Intellectual_property_rights',  [ 'page' => $page, 'tags' => $tags]);
    }

    public function tagbyidvid($id)
    {
        $tagvideos = [];
        $videos = Videos::get();
        foreach ($videos as $singlevideo) {
            $string = $singlevideo->TAG;
            $str_arr = explode(',', $string);
            foreach ($str_arr as $str_a) {
                if ($id == $str_a) {
                    $tagvideos[] = $singlevideo;
                }
            }
        }

        $tag = DB::table('poststags')->where('id', $id)->first();
        $page = array(
            "name" => $tag->TITLE,
            "tital" => $tag->TITLE,
            "description" => $tag->DESCRIPTION,
            "url" => url('/') . '/tagsvid/' . $tag->id . '/show',
            "imgurl" => asset('storage/' . $tag->IMG . '')
        );
        $tags = DB::table('poststags')->get();
        return view('public.tagsvid', ['page' => $page, 'tagvideos' => $tagvideos, 'videos' => $videos, 'tag' => $tag, 'tags' => $tags]);
    }


    ///////////////////////////////////////
    public function editprofile($id)
    {


        // $data = request()->validate([
        //     'password' => 'required|confirmed|min:8',
        // ]);
        dd($id);

        // $tag->TITLE = request('tital');
        // $tag->DESCRIPTION = request('description');
        // $tag->EDITOR = Auth::user()->id;
        // $tag->COLOR = request('COLOR');
        // $tag->TEXT = request('TEXT');
        // $tag->FACEBOOK = request('FACEBOOK');
        // $tag->YOUTUBE = request('YOUTUBE');
        // $tag->TWITTER = request('TWITTER');
        // $tag->INSTAGRAM = request('INSTAGRAM');
        // if (request('IMG')) {
        //     $tag->IMG = request('IMG')->store('uploads', 'public');
        // }

        // $tag->update();

        // return redirect("posts/tags");
    }


    public function edit(User $user)
    {
        if (Auth::user()) {
            if (Auth::user()->admin == "1") {
                return view('profiles.edit', compact('user'));
            } else return view('welcome');
        } else  return "You can't access here!";
    }




    //// 26/2/2023 add user control


    public function userscontrol()
    {

        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "طبكم - tebkum",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/logo_sport.png')
        );

        $users = User::all();
        $tags = DB::table('poststags')->get();
        $posts = DB::table('posts')->get();
        $videos = Videos::get();
        $programs = DB::table('programs')->get();
        $programsvideos = DB::table('programsvideos')->get();

        if (Auth::user()) {
            if (Auth::user()->admin) {
                return view('users.admin_users_control', ['users' => $users, 'tags' => $tags, 'posts' => $posts, 'videos' => $videos, 'programs' => $programs, 'programsvideos' => $programsvideos]);
            } else return view('error');
        } else return view('error');
    }

    public function showdayaction()
    {

        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "طبكم - tebkum",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/logo_sport.png')
        );

        $datenow = strtotime('-3:00');
        $d = date('Y-m-d', $datenow);
        $posts = DB::table('posts')->whereDate('DATE', $d)->get();
        $poststags = DB::table('poststags')->get();
        $videos = Videos::whereDate('DATE', $d)->get();
        $visitors = DB::table('visitors')->get();
        $postscount = DB::table('posts')->get();

        if (Auth::user()) {
            if (Auth::user()->admin) {
                return view('users.admin_posts_control', ['poststags' => $poststags, 'posts' => $posts, 'postscount' => $postscount, 'visitors' => $visitors, 'videos' => $videos, 'dateday' => $d]);
            } else return view('error');
        } else return view('error');
    }

    public function showdaysaction()
    {
        $page = array(
            "name" => "عمرة الفرقان",
            "tital" => "عمرة الفرقان",
            "description" => "عمرة الفرقان",
            "url" => url('/'),
            "imgurl" => asset('img/Asset 1.png')
        );
        $data = request()->validate([
            'date' => 'required',
        ]);
        $datan    =  strtotime(request('date'));
        $d = date('Y-m-d', $datan);
        $posts = DB::table('posts')->whereDate('DATE', $d)->get();
        $videos = Videos::whereDate('DATE', $d)->get();
        $poststags = DB::table('poststags')->get();

        if (Auth::user()) {
            if (Auth::user()->admin) {
                return view('users.admin_posts_control', ['poststags' => $poststags, 'posts' => $posts, 'videos' => $videos, 'dateday' => $d]);
            } else return view('error');
        } else return view('error');
    }

    public function sitemap($value = '')
    {
        $datenow = strtotime('-3:00');
        $tagposts = [];
        $tagpostswithtime = [];
        $posts = DB::table('posts')->orderBy('DATE_SCHEDULER', 'DESC')->get()->toArray();
        $videos = Videos::orderBy('DATE_SCHEDULER', 'DESC')->get()->toArray();

        $posts = array_merge($posts, $videos);

        // Sort the merged data by DATE_SCHEDULER in descending order
        usort($posts, function ($a, $b) {
            return strtotime($b->DATE_SCHEDULER) - strtotime($a->DATE_SCHEDULER);
        });

        $tags = DB::table('poststags')->get();

        $postswithtime = [];
        $datenow = strtotime('-3:00');
        foreach ($posts as $singlepost) {
            if (strtotime($singlepost->DATE_SCHEDULER) <= $datenow) {
                $postswithtime[] = $singlepost;
            }
        }
        $nm = 1;
        $wordCount = count($tagpostswithtime);

        return response()->view('sitemap', [
            'posts' => $postswithtime, 'tags' => $tags
        ])->header('Content-Type', 'text/xml');

   }
}