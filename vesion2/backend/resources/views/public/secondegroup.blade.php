@extends('layouts.welcome')

@section('content')
    {{-- <link rel="shortcut icon" href="..././انجابي فكتور-01-01.jpg" /> --}}

{{-- @section('content') --}}
    <style>
        :root {
            --width: 350px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .sam {
            /* height: 100vh; */
            display: grid;
            place-items: center;
        }


        .sam .cardss {
            display: flex;
            gap: 1.5rem;
        }

        .sam .cardes {
            position: relative;
            width: 100px;
            height: 280px;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.3);
            transition: width 0.5s ease-out;
        }

        .sam .cardes:hover {
            width: var(--width);
        }

        .sam .cardes:hover .cardes-containers .mm {
            transform: rotate(0);
        }

        .sam .cardes:hover .cardes-containers .SS {
            opacity: 1;
            transform: translateY(0);
            transition: transform 1s, opacity 0.3s linear 0.3s;
        }

        .sam .cardes:hover::before {
            transform: scale(1.3);
        }

        .sam .cardes::before {
            content: '';
            position: absolute;
            z-index: -1;
            width: 250px;
            height: 350px;
            background-size: cover;
            background-position: center;
            transform: scale(1);
            transition: transform 0.5s ease-in;
        }



        .sam .cardss .cardes-containers {
            position: absolute;
            left: 50%;
            bottom: 15%;
            transform: translateX(-50%);
            text-align: center;
            font: 900 1rem helvetica, sans-serif;
            color: white;
        }

        .sam .cardss .cardes-containers .mm {
            font-size: 1.1rem;
            letter-spacing: -1px;
            text-transform: uppercase;
            transform: rotate(90deg);
            transition: transform 0.5s;
        }

        .sam .cardss .cardes-containers .SS {
            position: relative;
            width: var(--width);
            font-size: 0.99rem;
            font-weight: 100;
            line-height: 1.6;
            color: rgba(255, 255, 255, 0.75);
            margin-top: 0.5rem;
            padding: 0 1.2rem;
            transform: translateY(2rem);
            opacity: 0;
        }

        .card-img-top {
            aspect-ratio: 6/4
        }

        .more {
            width: 100%;
            display: flex;
            justify-content: center;
            border-radius: 6px;
            margin: 20px;
        }

        .more a {
            padding: 8px 70px;
            background: #70b646;
            color: white;
            border-radius: 6px;

        }

        .card {
            border-radius: 12px;
            margin-left: 10px;
            overflow: hidden;
            height: 441px;
        }
.body{
    direction: rtl;
}
        .card img {
            border-radius: 0 !important
        }

        .card img:hover {
            transition: 0.4s;
            transform: scale(1.1)
        }
        .card-text{
            padding: 0;
        }
    </style>
    <div class="col-lg-12 " dir="rtl">
        <div class="section-title-area text-center">
            <h2 class="section-title ">{{ $maingroup->TITLE }}/{{ $group->TITLE }}</h2>
        </div>
    </div>
    <div class="sam">
        <main class='cardss'>

            @foreach (array_filter($mainTitle) as $maintag => $slicetags)
                <?php
                if ($maintag) {


                    $tag= App\Models\poststags::find($maintag);


                    ?>
                @if ($group->TITLE != $tag->TITLE)
                    <a href="{{ route('tagbyid', ['id' => $tag->id]) }}">
                        <div style="background-image: url({{ asset('storage/' . $tag->IMG . '') }}); background-size: cover;
 "class="cardes">
                            <div class='cardes-containers'>
                                <h2 class="mm">{{ $tag->TITLE }}</h2>
                                <p class="SS" style="color:white;    font-size: 20px;">{{ $tag->DESCRIPTION }}</p>
                            </div>
                        </div>
                    </a>
                @endif
                <?php  }?>
            @endforeach
        </div>


            @php
                            $maintag_posts= $Main_Tag->posts;
                            if (count($maintag_posts)==0){
                                $maintag_posts= $Main_Tag->videos;
                            }



                           @endphp
                               <div class="container">


                                {{-- Associated Posts Section --}}
                                <div class="mt-4">

            <div class="card-group">

                           <div class="content" style="display: flex;  justify-content: center; flex-wrap: wrap;">
                            @if (count($maintag_posts)>0)
                             @foreach ($maintag_posts->take(3) as $post)

                                <div class="col-lg-4 col-md-4 mb-4" dir="rtl">
                                    <div class="card" style="width: 100%;">
                                        <a href="{{route('postbyid', ['id' => $post->id])  }}">
                                            <div style="overflow: hidden;">
                                                <img src="{{ asset('storage/' . $post->IMG . "") }}" class="card-img-top" alt="tag Image">


                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"  style="text-align: center">{{ $post->TITLE }}</h5>
                                                <p class="card-text">{{ \Illuminate\Support\Str::limit($post->DESCRIPTION, 100) }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                            @endif
                        </div>
                        </div>
                        </div>
        </main>
    </div>





    <div class="container">


        {{-- Associated Posts Section --}}
        <div class="mt-4">




            <div class="card-group">
                <?php
                     $counter = 0;
                     ?>
                {{-- @foreach ($tags as $tag) --}}
                @foreach (array_filter($mainTitle) as $tag => $slicetags)
                <?php
  if ($tag) {


      $tag= App\Models\poststags::find($tag);



                foreach (App\Models\groups::all() as $key => $group) {

                    $tagArray = explode(',', $group->TAG);
                    $tagArray = array_filter($tagArray);
                    $lastTag = end($tagArray);

                    if ($lastTag == $tag->id) {
                        $counter++;
                        // if ($counter > 2) {
                            $groupId_have_same_tag_in_last = $group->id;
                            break;
                        // }
                    }
                }
            }
                ?>
                    @isset($groupId_have_same_tag_in_last)
@if ($tag)

                    <p
                        style="    font-size: 50px;
                        width: 100%;
                        text-align: center;
                        border-bottom: 2px solid #eee;
                        margin-bottom: 20px;
                        padding-bottom: 10px;">
                        {{ $tag->TITLE }}</p>
                    {{-- @foreach (App\Models\poststags::whereIn('id', $slicetags)->get() as $tag)
                        @if ($tag->TITLE != optional(App\Models\poststags::find($maintag))->TITLE) --}}

                    {{-- <div class="col-lg-12 mb-4">
                                <div class="section-title-area text-right">
                                    <h2 class="section-title ">{{ $tag->TITLE }}</h2>
                                </div>
                            </div> --}}


                        <div class="content" style="display: flex; width: 100%; justify-content: center; flex-wrap: wrap;">

                            {{-- @foreach (App\Models\poststags::whereIn('id', $slicetags)->get() as $tag)
                                 @if ($tag->TITLE != optional(App\Models\poststags::find($maintag))->TITLE) --}}
@php
$postsInTagGroup=\App\Models\Post::where('TOPIC', '=', $groupId_have_same_tag_in_last)->Orderby("REED",'desc')->take(3)->get();
$havevideos=false;

if (count($postsInTagGroup)==0) {
$havevideos=true;

    $postsInTagGroup=\App\Models\Videos::where('TOPIC', '=', $groupId_have_same_tag_in_last)->take(3)->get();

}
@endphp

                            @foreach ($postsInTagGroup as $post)
                                <div class="col-lg-4 col-md-6 mb-4" dir="rtl">
                                    <div class="card" style="width: 100%;">
                                        <a href="{{$havevideos ?  route('videobyid', ['id' => $post->id]):route('postbyid', ['id' => $post->id])  }}">
                                            <div style="overflow: hidden;">
                                                <img src="{{ asset('storage/' . $post->IMG) }}" class="card-img-top" alt="tag Image">
                                                
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title" style="text-align: center">{{ $post->TITLE }}</h5>
                                                <p class="card-text">
                                                    {{ \Illuminate\Support\Str::limit($post->DESCRIPTION, 100) }}</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                {{-- @endif --}}
                            @endforeach
                        </div>
@endif

                    @endisset

                    @isset($groupId_have_same_tag_in_last)
@if ($tag)

                        <div class="more">
                            <a href="{{$havevideos ? route('videotags', ['id' => $tag->id]): route('tagbyid', ['id' => $tag->id]) }}">
                                اظهار المزيد
                            </a>
                        </div>
                        @endif
                    @endisset
                    {{-- @endif


                        @endforeach --}}
                @endforeach


            </div>

        </div>
    @endsection
