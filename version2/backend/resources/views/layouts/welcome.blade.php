<!DOCTYPE html>
<html id="textA" lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="author" content="Nayef Yahya : nayefyahya98@gmail.com">


    <!-- Primary Meta Tags -->
    <title>{{ $page['name'] }}</title>
    <meta name="title" content="{{ $page['tital'] }}">
    <meta name="description" content="{{ $page['description'] }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $page['url'] }}">
    <meta property="og:title" content="{{ $page['tital'] }}">
    <meta property="og:description" content="{{ $page['description'] }}">
    <meta property="og:image" content="{{ $page['imgurl'] }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $page['url'] }}">
    <meta property="twitter:title" content="{{ $page['tital'] }}">
    <meta property="twitter:description" content="{{ $page['description'] }}">
    <meta property="twitter:image" content="{{ $page['imgurl'] }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@800&family=Cairo:wght@700&display=swap"
        rel="stylesheet">

        <link rel="stylesheet" href="{{ url('../pages/css/font-icons.css') }}">
        <!-- plugins css -->
        <link rel="stylesheet" href="{{ url('../pages/css/plugins.css') }}">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="{{ url('../pages/css/style.css') }}">
        <!-- Responsive css -->
        <link rel="stylesheet" href="{{ url('../pages/css/responsive.css') }}">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('main_page/css/bootstrap.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('css/uikit.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('main_page/css/all.min.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('main_page/css/slick.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('main_page/css/simple-line-icons.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('main_page/css/style.css') }}" type="text/css" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.css" type="text/css"
        media="all">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('main_page/images/favicon.png') }}">
    <meta name="google-site-verification" content="eyJ8yzeOSfqwMY-uUatET9qKkSTklVmMObZC4S_FvkY" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-4235055557207375"
        crossorigin="anonymous"></script>



    <style>

        /* For WebKit browsers (Chrome, Safari) */
.dropdown-menu::-webkit-scrollbar {
    width: 7px; /* width of the entire scrollbar */
}

/* For WebKit browsers (Chrome, Safari) */
.dropdown-menu::-webkit-scrollbar-track {
    background: #f1f1f1; /* color of the track */
}

/* For WebKit browsers (Chrome, Safari) */
.dropdown-menu::-webkit-scrollbar-thumb {
    background-color: #888; /* color of the scroll thumb */
    border-radius: 3px; /* roundness of the scroll thumb */
}
/* .ltn__utilize.ltn__utilize-mobile-menu{
    left: 372px !important;
} */
/* For Firefox */
.dropdown-menu {
    scrollbar-width: thin; /* width of the scrollbar */
}

/* For Firefox */
.dropdown-menu {
    scrollbar-color: #888 #f1f1f1; /* color of the scroll thumb and track */
}
.social{
    text-align: end;
display: flex;
    width: fit-content;
 flex-direction: column;
 align-items: center;
 justify-content: center;
}
@media (max-width:676px){

.social{
    flex-direction: row;
    width: 100%;
}
}
        html,
        body {
            font-family: 'Almarai', sans-serif;
            font-family: 'Cairo', sans-serif;
        }

        @media only screen and (max-width: 667px) {
            .social{
flex-direction: row;
        }
        }
        @media only screen and (min-width: 992px) {
            .header-right {
                display: none;
            }
        }

.hero-carousel{
    overflow: hidden;
}
        /* Bottom right text */
        .bottom-right {
            position: relative;
            bottom: 36px;
            right: 16px;
            color: #ffff
        }
        svg{
            max-width: none !important;

        }
        a{
            text-decoration: none !important;
        }
        .navbar-expand-lg .navbar-nav .nav-link{
            font-size: 16px;
        }
    </style>

</head>

<body >





<?php
   use App\Models\poststags;
   $tags=App\Models\poststags::all();
   ?>



    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>

        <!-- header -->
        <header style="direction: rtl; " class="sticky" >
            <nav class="navbar navbar-expand-lg " >
                <div class="container-xl">


                    <style>

                        .ltn__social-media-2 li:hover a{
                            background-color: #70b646 !important;
                        }
                        #searchInput:focus{
                            border-color:#70b646;
                        }
                        /* Define the styles for the scrollbar */

                        .header-contact-search{
                                align-items: center;
                                flex-direction: row-reverse;

                        }
                    </style>
                    <?php
                    use App\Models\groups;
                    $allgroups=groups::all();
                    ?>
                </head>


                    <div class="body-wrapper">
                        <!-- HEADER AREA START (header-3) -->
                        <!-- HEADER AREA START (header-4) -->
                        <header class="ltn__header-area ltn__header-8 section-bg-6">
                            <!-- ltn__header-top-area start -->
                         <div class="ltn__header-middle-area">
                            <div class="container">
                                <div class="">

                                    <div class="col header-contact-serarch-column d-none d-xl-block">
                                        <div class="header-contact-search">
                                            <!-- header-feature-item -->
                                            <div class="header-feature-item">
                                                <div class="header-feature-icon">

                                                </div>
                                                <div class="header-feature-info">
                                                    <div class="mobile-menu-toggle ">
                                                            <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                                                <svg viewBox="0 0 800 600" style="    height: 86px;
                    width: 90px;
                }">
                                                                    <path
                                                                        d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                                                        id="top"></path>
                                                                    <path d="M300,320 L540,320" id="middle"></path>
                                                                    <path
                                                                        d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                                                        id="bottom"
                                                                        transform="translate(480, 320) scale(1, -1) translate(-480, -318) ">
                                                                    </path>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                </div>
                                            </div>
                                            <!-- header-search-2 -->

                                            <div class="header-search-2" style="padding: 22px 0 0 0 !important ;position: relative;">


                                                    <input type="text" id="searchInput" placeholder="أبحث في طبكم"
                                                        style="margin: 0;    text-align: right;">
                                                        {{-- <span><i class="icon-magnifier"></i></span> --}}
                                                    <ul id="searchResults" style="    position: absolute;
                                                    width: 80%;
                                                    background: #70b646;
                                                    height: 0px;
                                                    color:white;
                                                    z-index: 1000;
                                                    border-radius: 12px;
                                                    padding: 10px;
                                                    display:none"
                                                    >

                </ul>
                                                    </button>
                                                {{-- </form> --}}
                                            </div>
                                                                        <div class="site-logo">
                                                                            <a class="navbar-brand" href="{{ url('/') }}"><img style="max-height: 100px;"
                                                                                src="{{ asset('main_page/images/logo.png') }}" alt="logo" /></a>

                                                            </div>
                                                            <div class="ltn__social-media-2">
                                                                <ul>
                                                                    <li><a href="#" title="twitter"><i
                                                                        class="fab fa-twitter"></i></a></li></a></li>
                                                                    <li><a href="#" title="youtube"><i
                                                                        class="fab fa-youtube"></i></a></li></a></li>
                                                                    <li><a href="#" title="instagram"><i
                                                                        class="fab fa-instagram"></i></a></li></a></li>
                                                                    <li><a href="#" title="tiktok"><i
                                                                        class='fab fa-tiktok'></i></a></li>
                                                                        <li><a href="https://www.facebook.com/tebkum                                    "><i
                                                                            class="fab fa-facebook-f"></i></a></li>
                                                                </ul>
                                </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- header-options -->
                                        <div class="ltn__header-options">
                                            <ul>

                                                <li class="d-none">
                                                    <!-- header-search-1 -->
                                                    <div class="header-search-wrap">
                                                        <div class="header-search-1">
                                                            <div class="search-icon">

                                                            </div>
                                                        </div>
                                                        <div class="header-search-1-form">
                                                            <form id="#" method="get"  action="#">
                                                                <input type="text" name="search" value="" placeholder="Search here..."/>
                                                                <button type="submit">
                                                                    <span><i class="icon-magnifier"></i></span>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="d-none">
                                                    <!-- user-menu -->
                                                    <div class="ltn__drop-menu user-menu">
                                                        <ul>
                                                            <li>
                                                                <a href="#"><i class="icon-user"></i></a>
                                                                <ul>
                                                                    <li><a href="login.html">Sign in</a></li>
                                                                    <li><a href="register.html">Register</a></li>
                                                                    <li><a href="account.html">My Account</a></li>
                                                                    <li><a href="wishlist.html">Wishlist</a></li>
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </li>

                                                <li style="    width: 208%;">
                                                    <!-- Mobile Menu Button -->
                                                    <div style="width: 100%;
                                                    display: flex;
                                                    justify-content: space-between;">

                                                    <div class="mobile-menu-toggle d-lg-none">
                                                        <a href="#ltn__utilize-mobile-menu" class="ltn__utilize-toggle">
                                                            <svg viewBox="0 0 800 600">
                                                                <path d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200" id="top"></path>
                                                                <path d="M300,320 L540,320" id="middle"></path>
                                                                <path d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190" id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                    <div>
                                                        <a class="navbar-brand  d-lg-none" href="{{ url('/') }}"><img style="max-height: 70px;"
                                                            src="{{ asset('main_page/images/logo.png') }}" alt="logo" /></a>
                                                    </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                            <!-- ltn__header-top-area end -->


                        <!-- Utilize Mobile Menu Start -->



                </div>
                </div>
            </nav>

        </header>
<style>
    @media (max-width:962px){
        .navbarold{
display: none !important;
}
.sticky{
    position: -webkit-sticky; /* Safari */
  position: sticky;
  top: 0; /* Adjust the value based on where you want the element to stick */
  background-color: white;
  z-index: 1000;

                        }
.header-default{
    padding: 0 !important;
}
    }
    @media (min-width:962px){
        .navbarold{
display: flex !important;
}

    }
    .nav-link {
    width: fit-content;
}
</style>

<header class="header-default">
            <nav class="navbar navbarold navbar-expand-lg ">
                <div class="container-xl">
                    @php
                        $TAGS_oF_group_new_have_Same_Inital_Tag = [];
@endphp


                    <div class="collapse navbar-collapse" style="justify-content: center">
                        <!-- menus -->
                        <div class="ltn__main-menu">
                        <ul>
<!-- Your Blade View -->

@php
    $controllerInstance = app(\App\Http\Controllers\HomeController::class);
@endphp


                            <li class="menu-icon {{($TAGS_oF_group_new_have_Same_Inital_Tag)>0? 'dropdown':'n'}} ">
                                <a class="" href="{{ route('groupbyid', ['id' => groups::where('TITLE', '=', 'المستشار الطبي')->first()->id]) }}">المستشار الطبي</a>
                                {!! app(\App\Http\Controllers\HomeController::class)->generateDropdownMenu('المستشار الطبي')!!}
</li>
                            <li class="menu-icon">
                                @php
$medical_id= groups::where('TITLE', '=', 'موضوعات طبية')->first()->id;
                                @endphp
                                <a class="" href="{{ route('groupbyid', ['id' => $medical_id]) }}">موضوعات طبية</a>
                                {!! app(\App\Http\Controllers\HomeController::class)->generateDropdownMenu('موضوعات طبية')!!}
                            </li>
                            <li class="menu-icon">
                                <a class="" href=" {{route('groupbyid', ['id' => groups::where('TITLE', '=', 'منوعات طبكم')->first()->id])}} ">منوعات طبكم</a>
                                {!! app(\App\Http\Controllers\HomeController::class)->generateDropdownMenu('منوعات طبكم')!!}

                            </li>
                            <li class="menu-icon">
                                <a class="" href="{{route('groupbyid', ['id' => groups::where('TITLE', '=', 'الأقسام الطبية')->first()->id])}} "> الأقسام الطبية</a>
                                {!! app(\App\Http\Controllers\HomeController::class)->generateDropdownMenu('الأقسام الطبية')!!}

                            </li>
                            <li class="menu-icon">
                                <a class="" href="{{route('groupbyid', ['id' => groups::where('TITLE', '=', 'صحة العائلة')->first()->id])}} ">  صحة العائلة</a>
                                {!! app(\App\Http\Controllers\HomeController::class)->generateDropdownMenu('صحة العائلة')!!}

                            </li>

                           <li class="menu-icon">
                                <a class="" href="https://injaby.com/"> إنجابي </a>
                            </li>
                           <li class="menu-icon">
                                <a class="" href="{{ route('groupbyid', ['id' => groups::where('TITLE', '=', 'الأمراض')->first()->id]) }}"> الأمراض </a>
                                {!! app(\App\Http\Controllers\HomeController::class)->generateDropdownMenu('الأمراض')!!}

                            </li>
                            <li class="menu-icon">
                                @php
                                  $humanbody_id=  groups::where('TITLE', '=', 'جسم الانسان')->first()->id;
                                @endphp
                                <a class="" href="{{ route('groupbyid', ['id' => $humanbody_id]) }}">  جسم الانسان </a>
                                {!! app(\App\Http\Controllers\HomeController::class)->generateDropdownMenu('جسم الانسان')!!}

                            </li>
                            {{-- dropdown --}}
                            <li class="menu-icon ">
                                 <a class=" " href="{{ route('groupbyid', ['id' => groups::where('TITLE', '=', 'طبكم TV')->first()->id]) }}">طبكم TV</a>
                                {!! app(\App\Http\Controllers\HomeController::class)->generateDropdownMenu('طبكم TV')!!}

                                {{-- <ul class="dropdown-menu" style="    HEIGHT: 500PX;
                                OVERFLOW-Y: SCROLL; TEXT-ALIGN:RIGHT">
                                    <li><a class="dropdown-item" href="/tags/11/show">السكري</a></li>
                                    <li><a class="dropdown-item" href="/tags/13/show">الأذن</a></li>
                                    <li><a class="dropdown-item" href="/tags/14/show">الأسنان</a></li>
                                    <li><a class="dropdown-item" href="/tags/15/show">الأعصاب</a></li>
                                    <li><a class="dropdown-item" href="/tags/16/show">البشرة </a></li>
                                    <li><a class="dropdown-item" href="/tags/17/show">الجهاز الهضمي</a></li>
                                    <li><a class="dropdown-item" href="/tags/18/show">الدم</a></li>
                                    <li><a class="dropdown-item" href="/tags/19/show">السرطان</a></li>
                                    <li><a class="dropdown-item" href="/tags/20/show">السمنة</a></li>
                                    <li><a class="dropdown-item" href="/tags/21/show">الشعر</a></li>
                                    <li><a class="dropdown-item" href="/tags/23/show">عظام</a></li>
                                    <li><a class="dropdown-item" href="/tags/24/show">قلب</a></li>
                                    <li><a class="dropdown-item" href="/tags/25/show">كلى</a></li>
                                    <li><a class="dropdown-item" href="/tags/22/show">النفسية</a></li>
                                    <li><a class="dropdown-item" href="/tags/28/show">العيون</a></li>
                                </ul> --}}
                            </li>
                            {{-- <li class="menu-icon"> --}}
                                {{-- <a class="nav-link" href="group/{{(groups::where('TITLE','=','جسم الانسان')->first())->id}}/show">جسم الأنسان </a> --}}
                            {{-- </li> --}}
                            {{-- <li class="menu-icon"> --}}
                                {{-- <a class="nav-link" href="{{ route('groupbyid', ['id' => groups::where('TITLE', '=', 'طبكم TV')->first()->id]) }}">طبكم TV</a> --}}
                            {{-- </li> --}}
                        </ul>
                    </div>
                    </div>

                    <!-- header right section -->
                    <div class="header-right">
                        <!-- header buttons -->
                        <div class="header-buttons">
                            <button class="search icon-button">
                                <i class="icon-magnifier"></i>
                            </button>
                            <button class="burger-menu icon-button">
                                <span class="burger-icon"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        </header>







 <div id="ltn__utilize-mobile-menu" class="ltn__utilize ltn__utilize-mobile-menu">
            <div class="ltn__utilize-menu-inner ltn__scrollbar">
                <div class="ltn__utilize-menu-head">
                               <div class="" style="text-align: right ;width:100%;margin:8px 0;padding: 10px 0;">

                       جميع الأقسام
                    </div>
                    <button class="ltn__utilize-close">×</button>
                </div>
                <div class="ltn__utilize-menu-search-form">

                </div>
                <div class="ltn__utilize-menu" dir="rtl" >
                    <ul class="menu-expand">
                        {{-- <li><a href="{{route('allTV')}}"> إنْجابيّ TV</a></li> --}}
                        <?php
$groupstitles = [];
$allgroupnew = [];
$charOrNumberToCheck = 'some_character_or_number';
foreach ($allgroups as $group) {
    $group_array_string=$group->TAG;
    $GROUP_TAG_arr = explode(',', $group_array_string);
    if (!in_array($GROUP_TAG_arr[0], $groupstitles)) {
        $mergedTags = $group->TAG;


foreach ($allgroups as $groupseconde) {
    $groupseconde_array_string=$group->TAG;
    $groupseconde_TAG_arr = explode(',', $groupseconde_array_string);
            if ($GROUP_TAG_arr[0] == $groupseconde_TAG_arr[0] && $group->id != $groupseconde->id) {
                $mergedTags .= ',' . $groupseconde->TAG;
            }
        }

        if (count(array_filter($GROUP_TAG_arr))==1 ) {
            $allgroupnew[] = $group;
            $groupstitles[] = $GROUP_TAG_arr[0];
            $group->TAG = $mergedTags;
        }
    }
}
?>
        @foreach ($allgroupnew as $group)
        <?php
      $string = $group->TAG;
       $str_arr = '';
                                                              $str_arr = explode(',', $string);
                                                              $groubs_same_name=[];
                                                              $second_indexs=[];
                                                              foreach ($allgroups as$value) {
                                                               if (explode(',', $group->TAG)[0]==explode(',', $value->TAG)[0]) {
                                                                $groubs_same_name[]=$value;
                                                               }
                                                              }


                                                              ?>
                                                              <li style="display: block;
          padding: 8px 24px 8px 0;
          text-transform: uppercase;">

                                                                  <a href="{{route('groupbyid',['id'=>$group->id])}}" style=" cursor: pointer;padding:0">{{ $group->TITLE }}</a>
                                                                  <ul class="sub-menu">
                                                                      @foreach ($tags as $key => $singletag)
                                                          <?php
      foreach ($groubs_same_name as $item) {
          $string_array = explode(',', $item->TAG);

          if (count($string_array) > 1) {
              $key = $string_array[1];
              if (!isset($second_indexs[$key])) {
                  $second_indexs[$key] = [];
              }

              $slices = array_slice($string_array, 2);
              $mergedArray = array_merge($second_indexs[$key], $slices);
              $second_indexs[$key] = array_unique($mergedArray);
          }
      }


                                                          ?>
                                                     @if (in_array($singletag->id, $str_arr))
                                                     @if( array_key_exists($singletag->id, $second_indexs))
                                                     <li  style="display: block;
                                                     padding: 8px 24px 8px 0;
                                                     text-transform: uppercase;">
                                                     <?php

                                                     ?>
                                                         <a href="{{count($singletag->posts)==0 ?route('groupsecbyid', ['id' => $singletag->id]): route('groupsecbyid', ['id' => $singletag->id]) }}" style="text-align: right;">
                                                             {{ $singletag->TITLE }}
                                                         </a>
                                                     @endif
                                                         <ul class="sub-menu">
                                                          @isset($second_indexs[$singletag->id] )



                                                             @foreach ($second_indexs[$singletag->id] as $subItem)
                                                             <li>
                                                              <?php
                                                              $poststag = poststags::where('id', '=', $subItem)->first();

                                                              ?>
                                                              @if ($poststag)
                                                              <a href="{{count($poststag->posts)==0 ?route('videotags', ['id' => $poststag->id]): route('showtag', ['tag' => $poststag->id]) }}" style="text-align: right;">
                                                                  {{ $poststag->TITLE }}
                                                              </a>
                                                              @endif
                                                          </li>
                                                             @endforeach
                                                             @endisset
                                                         </ul>
                                                     </li>
                                                 @endif
                                                                      @endforeach
                                                                  </ul>
                                                              </li>
                                                          @endforeach



                    <div class="ltn__social-media-2">
                    <ul>
                        <li><a href="https://twitter.com/Tebkum" title="twitter"><i
                            class="fab fa-twitter"></i></a></li></a></li>
                        <li><a href="https://www.youtube.com/@Tebkum" title="youtube"><i
                            class="fab fa-youtube"></i></a></li></a></li>
                        <li><a href="https://www.instagram.com/tebkum" title="instagram"><i
                            class="fab fa-instagram"></i></a></li></a></li>
                        <li><a href="https://www.tiktok.com/tebkum" title="tiktok"><i
                            class='fab fa-tiktok'></i></a></li>
                            <li><a href="https://www.facebook.com/tebkum                                    "><i
                                class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        </div>


        @yield('content')


        <!-- footer -->
        {{-- <footer>
            <div class="container-xl">
                <div class="footer-inner">
                    <div class="row pb-3">
                        <div class="col">
                            <div style="padding: 0px" class="widget rounded">
                                <div class="widget-about data-bg-image text-center">
                                    <p style="margin-top: revert;" class="mb-4">جميع المعلومات الواردة في الموقع هي
                                        لغايات المعرفة والثقافة الصحية ولا تغني عن استشارة المختصين
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex align-items-center gy-4">
                        <!-- copyright text -->
                        <div class="col-md-4">
                            <p>&copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> كافة الحقوق محفوظة | تم تصميمه من
                                قبل <a href="https://doroobgroup.com/" target="_blank">دروب
                                    السلام</a>
                            </p>
                        </div>

                        <!-- social icons -->
                        <div class="col-md-4 text-center">
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="https://www.facebook.com/tabkom"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="https://twitter.com/tebkum"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.youtube.com/@Tebkum"><i
                                            class="fab fa-youtube"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.instagram.com/tebkum"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.tiktok.com/tebkum"><i
                                            class='fab fa-tiktok'></i>
                                    </a></li>
                            </ul>
                        </div>

                        <!-- go to top button -->
                        <div class="col-md-4">
                            <a href="#" id="return-to-top" class="float-md-end"><i
                                    class="icon-arrow-up"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer> --}}


        <footer>
            <div class="col-12">
            <div class="container-xl">
                <div class="footer-inner">
                    <div dir="rtl" class="row d-flex align-items-center gy-4">
                        <div class="col-sm-12 col-md-6 col-lg-2">
                            <img style="width: 190px;" src="{{ asset('main_page/images/logo.png') }}" alt="logo"
                                class="mb-4" />
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-2">
                            <p>طبكم هي منصة صحية تثقيفية نعل من خلالها على توفير المعلومات الطبية
                                الموثوقة لإثراء الثقافة الصحية ونشرها في أوساط المجتمع العربي</p>
                        </div>
                        {{-- @dd($mergedTags); --}}

                        <div class="col-lg-1 col-md-1 col-sm-12 flex" style="       justify-content:center;                    padding: 0;
                        margin: 0;">
                            <ul class="social"  class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="https://www.facebook.com/tebkum                                    "><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="https://twitter.com/tebkum"><i
                                            class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.youtube.com/@Tebkum"><i
                                            class="fab fa-youtube"></i></a></li>
                                <li class="list-inline-item"><a href="https://www.instagram.com/tebkum"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item" style="    margin-right: 1rem;"><a href="https://www.tiktok.com/tebkum"><i
                                            class='fab fa-tiktok'></i>
                                    </a></li>
                            </ul>
                        </div>
                        <style>
                            .col-2 p {
                                width: 136px;
                                        text-align: right;
                                        margin-top: 20px;
                            }
                            .col-lg-2 a {
                                color: rgb(91, 83, 52) !important
                            }
                            .col-lg-2 a:hover {
                                color:#70b646 !important;
                            }
                            /* .address{
                                width: 136px;
                                        text-align: right;
                                        margin-top: 20px;
                            } */
                            .fa-address-book {
                                margin-left: 21px
                            }
                            .fa-image{
                                margin-left: 8px;
                            }
                            .fa-book{
                                margin-left: 21px;

                            }
                            .fa-user{
                                margin-left: 25px;

                            }
                            .fa-book{
                                margin-left: 21px;

                            }


                        </style>
                        <div style="text-align: center;" class=" col-sm-12 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col">
                                    <p>جميع المعلومات الواردة في الموقع هي
                                        لغايات المعرفة والثقافة الصحية ولا تغني عن استشارة المختصين</p>
                                </div>
                            </div>

                            <div class="row" style="    margin-top: 27px;
                            ">
                                <div class="col-sm-12 col-md-6 col-lg-2">
                                    <a href="{{route('aboutus')}}">
                                    <i class="fa-solid fa-circle-info fa-2xl"></i>
                                        <p class="circle" >عن طبكم</p>
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2">
                                    <a href="{{route('contactus')}}">
                                    <i class="fa-regular fa-address-book fa-2xl"></i>
                                        <p  class="address">اتصل بنا</p>
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2">
                                    <a href="#">
                                    <i class="fa-solid promote fa-image fa-2xl"></i>
                                        <p>اعلن معنا</p>
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2">
                                    <a href="{{route('policy')}}">
                                    <i class="fa-solid fa-book fa-2xl" ></i>
                                        <p  >سياستنا</p>
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2">
                                    <a href="{{route('privacy')}}">
                                    <i class="fa-solid fa-user fa-2xl" ></i>

                                        <p > سياسة الخصوصية</p>
                                    </a>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-2">
                                    <a href="{{route('Intellectual_property_rights')}}">
                                    <i class="fa-solid fa-user fa-2xl" ></i>

                                        <p >  سياسة حقوق الملكية الفكرية
</p>
                                    </a>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col">
                                    <p>&copy;
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script> كافة الحقوق محفوظة | تم تصميمه من
                                        قبل <a href="https://doroobgroup.com/" target="_blank">دروب
                                            السلام</a>
                                    </p>
                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>
        </footer>
    </div><!-- end site wrapper -->

    <!-- search popup area -->
    <div dir="rtl" class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">البحث في طبكم</h3>
            </div>
            <!-- form -->
            <form class="d-flex search-form">
                <input style="text-align: right" class="form-control me-2" type="search"
                    placeholder="اكتب هنا ما تريد البحث عنه في طبكم" aria-label="Search">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>
        </div>
    </div>

    <!-- canvas menu -->
    <div class="canvas-menu d-flex align-items-end flex-column">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>

        <!-- logo -->
        <div class="logo">
            <img src="{{ asset('main_page/images/logo.png') }}" alt="Tebkum" />
        </div>

        <!-- menu -->
        <nav>
            <ul class="vertical-menu">
                <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
                <li> <a href="/tags/2/show">الأخبار الطبية</a></li>
                <li> <a href="#">الطب البديل</a></li>
                <li class="active">
                    <a href="#">الأمراض</a>
                    <ul class="submenu">
                        <li><a href="/tags/11/show">السكري</a></li>
                        <li><a href="/tags/13/show">الأذن</a></li>
                        <li><a href="/tags/14/show">الأسنان</a></li>
                        <li><a href="/tags/15/show">الأعصاب</a></li>
                        <li><a href="/tags/16/show">البشرة </a></li>
                        <li><a href="/tags/17/show">الجهاز الهضمي</a></li>
                        <li><a href="/tags/18/show">الدم</a></li>
                        <li><a href="/tags/19/show">السرطان</a></li>
                        <li><a href="/tags/20/show">السمنة</a></li>
                        <li><a href="/tags/21/show">الشعر</a></li>
                        <li><a href="/tags/23/show">عظام</a></li>
                        <li><a href="/tags/24/show">قلب</a></li>
                        <li><a href="/tags/25/show">كلى</a></li>
                        <li><a href="/tags/22/show">النفسية</a></li>
                        <li><a href="/tags/28/show">العيون</a></li>
                    </ul>
                </li>
                <li> <a href="{{ url('/') }}">الأدوية</a>
                </li>
                <li><a href="/tags/5/show">الحمل و الولادة</a></li>
                <li><a href="/tags/3/show">طبكم TV</a></li>
                <li><a href="#">موسوعة طبكم</a></li>
            </ul>
        </nav>

        <!-- social icons -->
        <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            <li class="list-inline-item"><a href="https://www.facebook.com/tebkum
                "><i
                        class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="https://twitter.com/Tebkum"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="https://www.youtube.com/@Tebkum"><i class="fab fa-youtube"></i></a>
            </li>
        </ul>
    </div>
    <script src="{{ asset('../pages/js/search.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script src="{{ url('pages/js/plugins.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ url ('pages/js/main.js') }}"></script>
    <script src="{{ url ('pages/js/contact.js') }}"></script>
    <!-- JAVA SCRIPTS -->
    <script src="{{ asset('main_page/js/jquery.min.js') }}"></script>
    <script src="{{ asset('main_page/js/popper.min.js') }}"></script>
    <script src="{{ asset('main_page/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('main_page/js/slick.min.js') }}"></script>
    <script src="{{ asset('main_page/js/jquery.sticky-sidebar.min.js') }}"></script>
    <script src="{{ asset('main_page/js/custom.js') }}"></script>

</body>

<script>


// function fetchvideos() {
//         // var loader = document.querySelector('.spinnerrr');

//         fetch('/fetch-video')
//         .then(function (response) {
//                 if (!response.ok) {
//                     throw new Error('Network response was not ok');
//                 }
//                 return response.json(); // Return the parsed JSON
//             })
//             .then(function (data) {
//                 // loader.style.display = 'none';
//                 console.log(data);
//                 document.querySelector('.post-carousel-lg').innerHTML = data.content;
//             })
//             .catch(function (error) {
//                 console.error(error);

//             });
//     }

//     fetchvideos()
    </script>
</html>
