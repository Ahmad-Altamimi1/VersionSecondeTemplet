<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use App\Models\poststags;
use App\Models\Videos;
use App\Models\groups;
use DB;

use Illuminate\Support\Facades\View;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

            // $response = file_get_contents('https://injaby.com/api/apitags');
                                           // $anjaby = json_decode($response);
        $first_slider=(poststags::where("TITLE",'=','صحة القلب')->first());
         $seconde_slider=(poststags::where("TITLE",'=','الأعشاب')->first());
         $TV=poststags::where("TITLE", '=', 'طبكم TV')->first();
         $Altebalbdel=poststags::where("TITLE", '=', 'أمراض الدم')->first();

         $alnfseh=poststags::where("TITLE", '=', 'الصحة النفسية')->first();
         $almrad=poststags::where("TITLE", '=', 'الأمراض')->first();
         $mudu3attbeh=poststags::where("TITLE", '=', 'موضوعات طبية')->first();
         $AI=poststags::where("TITLE", '=', 'جسم الانسان')->first();
         $Human=$AI->TAG;
         $posts_thumbs=poststags::where("TITLE", '=', 'الأعشاب')->first();
        //  $tags_in_one_Arry=[$almrad,$first_slider , $seconde_slider  , $Altebalbdel ,  $mudu3attbeh , $AI , $posts_thumbs ];
         $tags_in_one_Arry = Post::inRandomOrder()
         ->distinct('TAG')
         ->take(6)
         ->get();


           $posts = DB::table('posts')->get();
           $videos = Videos::orderBy('id', 'DESC')->take(6)->get();
    //    $lastposts=DB::table('posts')->orderBy('DATE', 'DESC')->take(4)->get();
           $mostposts = Post::orderBy('REED', 'DESC')->take(4)->get();
           $lastposts = Post::orderBy('DATE', 'DESC')->take(4)->get();
           $onepost = Post::inRandomOrder()->first();

           $mostvideos = DB::table('videos')->orderBy('REED', 'DESC')->get();
           $mosttags = DB::table('poststags')->orderBy('REED', 'DESC')->get();
           $tags = poststags::all();

           $groups = DB::table('groups')->get();
       //     $defaultData =Post::defaultData()->take(1)->get();
       // dd($defaultData);
           $postswithtime =[];
        //    $datenow = strtotime('-3:00');
        //    foreach ($posts as $singlepost) {
        //        if (strtotime($singlepost->DATE_SCHEDULER) <= $datenow) {
        //            $postswithtime[] = $singlepost;
        //        }
        //    }
    //        foreach (Videos::all() as $key => $post) {
    //           $group= groups::where("id",'=',$post->TOPIC)->first();
    //    $arry= explode(",",$group->TAG);
    //    $arry=array_filter($arry);
    //    $end=end($arry);
    //    $post->TAG=$end;
    //    $post->update();

    //        }
       $intersted=[];
       $ids=[];
       $i=0;
       foreach ($posts  as $key => $value) {
       if (!in_array($value->TAG,$ids) && $i< 8) {
           $intersted[]=$value;
           $ids[]=$value->TAG;
           $i++;
       }
       }


           $page = array(
               "name" => "طبكم - tebkum",
               "tital" => "طبكم - tebkum",
               "description" => "طبكم - tebkum",
               "url" => url('/'),
               "imgurl" => asset('main_page/images/logo.png')
           );
           return view('welcome', ['lastposts' => $lastposts,'page' => $page,'groups' => $groups, 'posts' => $postswithtime, 'mosttags' => $mosttags, 'mostposts' => $mostposts, 'mostvideos' => $mostvideos, 'videos' => $videos, 'tags' => $tags , 'intersted'
           => $intersted,"posts_thumbs"=>$posts_thumbs,'first_slider'=>$first_slider,
           'Altebalbdel'=>$Altebalbdel,'TV'=>$TV,'seconde_slider'=>$seconde_slider,'mudu3attbeh'=>$mudu3attbeh,
           'alnfseh'=>$alnfseh,'almrad'=>$almrad,'AI'=>$AI,'Human'=>$Human,'alnfseh'=>$alnfseh,'tags_in_one_Arry'=>$tags_in_one_Arry,'onepost'=>$onepost]);
       }

    public function fetchContent(Request $request)
    {

        $tagTitle = $request->input('tagTitle');
$slicedTags=[];
        $tag = poststags::where('TITLE', $tagTitle)->first();
        $id = $tag->id;
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
        $posts_thumbs = Post::whereIn("id", $postIdsInTag)->orderBy('id', 'asc')->get();
        $havevideo=false;
        if (count($posts_thumbs)==0 ) {


            $postIdsInTag = Videos::whereIn("TAG", $slicedArray)->pluck('id')->toArray();
        if ( count(Videos::whereIn("id", $postIdsInTag)->orderBy('id', 'asc')->get())>0) {
$havevideo=true;
            $posts_thumbs = Videos::whereIn("id", $postIdsInTag)->orderBy('id', 'asc')->get();

        }}

        $sortingOption = request('sort');
        $pageid = $id;



        $content = View::make('public.thumb', compact('posts_thumbs','havevideo'))->render();

        return response()->json(['content' => $content]);
    }


    public function error (){
        $page = array(
            "name" => "طبكم - tebkum",
            "tital" => "حدث خطأ",
            "description" => "طبكم - tebkum",
            "url" => url('/'),
            "imgurl" => asset('img/Asset 1.png')
        );
    return view('public.404',compact('page'));


    }

    public function fetchvideo()
    {
        $videos = Videos::orderBy('id', 'DESC')->take(6)->get();

        if (!$videos) {
            return response()->json(['error' => 'Tag not found'], 404);
        }
        $content = View::make('partial.videos', compact('videos'))->render();

        return response()->json(['content' => $content]);
    }




    function generateDropdownMenu($groupTitle)
    {
        $TAGS_oF_group_new_have_Same_Inital_Tag = [];

        $tags_in_Group = explode(',', groups::where('TITLE', '=', $groupTitle)->first()->TAG);

        foreach (groups::all() as $key => $groupdropmenu) {
            $tags_in_allgroup = explode(',', $groupdropmenu->TAG);
            if ($tags_in_Group[0] == $tags_in_allgroup[0]) {
                $index = $tags_in_allgroup[1];

if (isset($TAGS_oF_group_new_have_Same_Inital_Tag[$index])) {
    $TAGS_oF_group_new_have_Same_Inital_Tag[$index] = array_merge($TAGS_oF_group_new_have_Same_Inital_Tag[$index], array_slice($tags_in_allgroup, 2));
} else {
    $TAGS_oF_group_new_have_Same_Inital_Tag[$index] = array_slice($tags_in_allgroup, 2);
}

            }
        }

        $html = '';
        if (count($TAGS_oF_group_new_have_Same_Inital_Tag) > 1) {
            $html .= '<ul  style=" TEXT-ALIGN:RIGHT">';

            foreach ($TAGS_oF_group_new_have_Same_Inital_Tag as $key => $item) {
                $keytag = poststags::find($key);
                $havevideos = false;
                if ($keytag) {
                    if (count($keytag->posts)==0 &&count($keytag->posts)>0) {
$havevideos=true;
                    }

                    $html .= '<li style="TEXT-ALIGN:RIGHT"><a href="' . ($havevideos ? route('groupsecbyid', ['id' => $keytag->id]) : route('groupsecbyid', ['id' => $keytag->id])) . '">' . (count($item) > 1 ? "<span class='spanleft' style='float: left;'><<</span>" : "") . $keytag->TITLE . '</a>';

                if (count($item)>1) {
// DD(array_filter($item));
$uniqueItems = [];
                $html .='<ul>';
                foreach ($item as $singleitem) {
                    if (!(in_array($singleitem,$uniqueItems))) {
                        $uniqueItems[]=$singleitem;

                    $keytag = poststags::find($singleitem);
                    $havevideos = false;
                    if ($keytag) {
                        if (count($keytag->posts)==0 &&count($keytag->posts)>0) {
    $havevideos=true;
                        }


                    $html .= '<li style=" TEXT-ALIGN:RIGHT"><a href="' . ($havevideos ? route('videotags', ['id' => $keytag->id]) : route('tagbyid', ['id' => $keytag->id])) . '">' . $keytag->TITLE . '</a></li>';
                }

                }
            }
            $html .='</ul>';
        }
        $html .='</li>';
                }
            }

            $html .= '</ul>';
        }

        return $html;
    }


}