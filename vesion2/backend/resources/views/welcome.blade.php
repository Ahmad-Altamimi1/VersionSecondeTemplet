@extends('layouts.welcome')
<style>
    .post-over-content .thumb2 {
        height: 261px;

    }

    button[id^="tag"] {

        background-color: transparent;
        transition: background-color 0.3s ease;
    }

    .inner img {
        aspect-ratio: 1;
        object-fit: cover;
    }

    .preloader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        /* Background color of the preloader */
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        /* Make sure it appears on top of other elements */
    }

    a {
        text-decoration: none !important;
    }

    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #70b646;
        /* Loader color */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .sliderforres {
        margin-left: 113px;
        width: 573px;
    }

    .arrowsliderrespo {
        width: 367px;
        padding-left: 133px;
    }

    .sliderforres .clearfix {
        padding-right: 113px
    }

    .columnalso .post-title:not(.noot) {
        margin: -19px 0;
        font-size: 15px;
        padding-top: 20px;
    }

    .h55 {
        position: absolute;
        bottom: 30px;
        z-index: 0;
        border-radius: 6px;
        height: auto;
        text-align: center;
        color: white;
        left: 50%;
        transform: translate(-43.4%);
        width: 89.1%;
        background: #00000094;
        padding: 9px;
    }

    @media (max-width:676px) {
        .sliderforres {
            margin-left: 0;
            width: auto;
        }

        .social {
            flex-direction: row;
            width: 100%;
        }

        .columnalso .post-title a {
            font-size: 9px !important;
        }

        .arrowsliderrespo {
            width: auto;
            padding-left: 0;
        }

        .post .post-over-content .clearfix {
            padding-right: 0 !important;
        }

        .columnalso {
            margin: 0 52px 0 0 !important;
        }

        .h55 {
            left: 61% !important;
            bottom: -2px !important;
        }

        .post .category-badge.lg {
            font-size: 9px !important;
        }

        .title34 .post-title {}

    }
</style>
@section('content')
    <style>
        /* .ltn__utilize.ltn__utilize-mobile-menu{
            right: 0px !important;
        } */
    </style>
    <div class="preloader">
        <div class="loader"></div>
    </div>

    <section class="hero-carousel pt-5">
        <div class="container-xl">
            <div class="row">
                <div class="col-sm-8">
                    <div class="post-carousel-lg">

                        <!-- post -->
                        <?php
                        // $string = $group->TAG;
                        // $str_arr = explode(',', $string);
                        // $str_arr = array_filter($str_arr);
                        use App\Models\poststags;
                        ?>


                        @foreach ($videos as $video)
                            <div class="post featured-post-xl">
                                <div class="details clearfix">

                                    {{-- @if (end($str_arr) == $singletag->id) --}}
                                    <a href="/tags/{{ $video->tag->id }}/show"
                                        class="category-badge lg">{{ $video->tag->TITLE }}</a>


                                    <h4 class="post-title"><a
                                            href="/videos/{{ $video->id }}/show">{{ $video->TITLE }}</a>
                                    </h4>
                                </div>
                                <a href="/videos/{{ $video->id }}/show">
                                    <div class="thumb rounded">
                                        <div class="inner data-bg-image"
                                            data-bg-image="{{ asset('storage/' . $video->IMG . '') }}"></div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="post-tabs rounded bordered">
                        <!-- tab navs -->
                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true"
                                    class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab"
                                    role="tab" type="button">الأكثر
                                    مشاهدة</button>
                            </li>
                            <li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false"
                                    class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab"
                                    role="tab" type="button">الأحدث</button></li>
                        </ul>
                        <!-- tab contents -->
                        <div class="tab-content" id="postsTabContent">
                            <!-- loader -->

                            <!-- popular posts -->
                            <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular"
                                role="tabpanel">

                                @foreach ($mostposts as $singlepost)
                                    <div class="post post-over-content pt-3" style="text-align: center;">
                                        <div class="details clearfix">

                                            <a href="/tags/{{ $singlepost->tag->id }}/show"
                                                class="category-badge lg">{{ $singlepost->tag->TITLE }}</a>

                                            <p style="margin: -19px 0; font-size: 15px; padding-top: 20px"
                                                class="post-title"><a
                                                    href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 40) }}</a>
                                            </p>
                                        </div>
                                        <a href="/posts/{{ $singlepost->id }}/show">
                                            <div class="thumb rounded">
                                                <div style="height: 90px" class="inner">
                                                    <img style="border-radius: 7px;"
                                                        src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                        alt="{{ $singlepost->TITLE }}" />
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                            <!-- recent posts -->
                            <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                <?php
                                $xx = 0;
                                ?>
                                @foreach ($lastposts as $singlepost)
                                    {{-- @if ($xx <= 4 && $xx > 0) --}}
                                    <div class="post post-over-content pt-3" style="text-align: center;">
                                        <div class="details clearfix">
                                            <a href="/tags/{{ $singlepost->tag->id }}/show"
                                                class="category-badge lg">{{ $singlepost->tag->TITLE }}</a>
                                            <p style="margin: -19px 0; font-size: 15px; padding-top: 20px"
                                                class="post-title"><a
                                                    href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 40) }}</a>
                                            </p>
                                        </div>
                                        <a href="/posts/{{ $singlepost->id }}/show">
                                            <div class="thumb rounded">
                                                <div style="height: 90px" class="inner">
                                                    <img style="border-radius: 7px;"
                                                        src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                        alt="{{ $singlepost->TITLE }}" />
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    {{-- @endif --}}
                                    <?php
                                    $xx++;
                                    ?>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <section style="text-align: right;" class="main-content pt-5">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-4">

                    <!-- sidebar -->
                    <div class="sidebar">
                        <!-- widget about -->
                        <div class="widget rounded">
                            <div class="widget-about data-bg-image text-center">
                                <img src="{{ asset('main_page/images/logo.png') }}" alt="logo" class="mb-4" />
                                <p class="mb-4">طبكم هي منصة صحية تثقيفية نعل من خلالها على توفير المعلومات الطبية
                                    الموثوقة لإثراء الثقافة الصحية ونشرها في أوساط المجتمع العربي</p>
                                <ul class="social-icons list-unstyled list-inline mb-0">
                                    <li class="list-inline-item"><a href="https://www.facebook.com/tebkum"><i
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
                        </div>

                        <!-- widget post carousel -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">المستشار الطبي</h3>
                            </div>
                            <div class="widget-content">
                                <div class="post-carousel-widget post-carousel-widgetw ">
                                    <?php
                                    $xx = 0;
                                    ?>
                                    @foreach (App\Models\poststags::where('TITLE', '=', 'المستشار الطبي')->first()->posts->take(4) as $singlepost)
                                        {{-- @if ($singlepost->TOPIC == '4')
                                            @if ($xx <= 15) --}}
                                        <!-- post -->
                                        <div class="post post-carousel">
                                            <div class="thumb rounded">
                                                <a href="/posts/{{ $singlepost->id }}/show">
                                                    <div class="inner">
                                                        <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                            alt="{{ $singlepost->TITLE }}" />
                                                    </div>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-0 mt-4"><a
                                                    href="/posts/{{ $singlepost->id }}/show">سؤال :
                                                    {{ $singlepost->TITLE }}</a>
                                            </h5>
                                            <li class="list-inline-item">
                                                {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}
                                            </li>
                                            </ul>
                                        </div>
                                        {{-- @endif
                                            <?php
                                            // $xx++;
                                            ?>
                                        @endif --}}
                                    @endforeach



                                </div>
                                <!-- carousel arrows -->
                                <div class="slick-arrows-bot">
                                    <button type="button" data-role="none"
                                        class="carousel-botNav-prevw slick-custom-buttons" aria-label="Previous"><i
                                            class="icon-arrow-left"></i></button>
                                    <button type="button" data-role="none"
                                        class="carousel-botNav-nextw slick-custom-buttons" aria-label="Next"><i
                                            class="icon-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>



                        <!-- widget advertisement -->
                        <div class="widget no-container rounded text-md-center">
                            <span class="ads-title">- اعلان ممول -</span>
                            <a href="#" class="widget-ads">
                                <img src="{{ asset('main_page/images/ads/ad-360.png') }}" alt="Advertisement" />
                            </a>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8">


                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">صحة القلب</h3>
                        <div class="slick-arrows-top pt-5  pt-5">
                            <button style="color: white; background: #203656;" type="button" data-role="none"
                                class="carousel-topNav-prevt slick-custom-buttons" aria-label="Previous"><i
                                    class="icon-arrow-left"></i></button>
                            <button style="color: white; background: #203656;" type="button" data-role="none"
                                class="carousel-topNav-nextt slick-custom-buttons" aria-label="Next"><i
                                    class="icon-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="row post-carousel-twoCol post-carousel common-slider">

                        <?php
                        $xx = 0;
                        ?>
                        {{-- @foreach ($posts as $singlepost)
                            @if ($singlepost->TOPIC == '3')
                                @if ($xx <= 4) --}}
                        @foreach ($first_slider->posts->take(8) as $singlepost)
                            <div style="
                                        width: 356px;
                                        border-radius: 11px;
                                        border-style: solid;
                                        padding: 10px;
                                        border-width: thin;
                                        max-height: 455px;
    height: 455px;
                                    "
                                class="post">
                                <div class="thumb rounded">
                                    <a href="/posts/{{ $singlepost->id }}/show">
                                        <div style="max-height: 200px;" class="inner">
                                            <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                alt="post-title" />
                                        </div>
                                    </a>
                                </div>
                                <ul class="meta list-inline mt-4 mb-0">
                                    <li class="list-inline-item">
                                        {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}</li>
                                </ul>
                                <h5 class="post-title mb-3 mt-3"><a
                                        href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 60) }}</a>
                                </h5>
                                <p class="excerpt mb-0">{{ Str::limit($singlepost->DESCRIPTION, 150) }}</p>
                            </div>
                            {{-- @endif --}}
                            <?php
                            $xx++;
                            ?>
                            {{-- @endif --}}
                        @endforeach


                    </div>

                    <div class="spacer" data-height="50"></div>


                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">أعشاب</h3>
                        <div class="slick-arrows-top arrowsliderrespo pt-5  pt-5">
                            <button type="button" data-role="none" class="carousel-botNav-prevw  slick-custom-buttons"
                                aria-label="Previous"><i class="icon-arrow-left"></i></button>
                            <button type="button" data-role="none" class="carousel-botNav-nextw   slick-custom-buttons"
                                aria-label="Next"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>


                    <div class="row post-carousel-widget post-carousel common-slider sliderforres" style=" ">
                        <div class="lds-dual-ring preloadd"></div>
                        @php
                            $xx = 0;
                        @endphp



                        @foreach ($seconde_slider->posts as $Spost)
                            {{-- @foreach (App\Models\poststags::where('TITLE', '=', 'صحة القلب')->first()->posts->take(4) as $Spost) --}}


                            <!-- post -->
                            <div class="post post-over-content col-md-6" style="width: 600px;    margin-left: -25px;">
                                <div class="details clearfix">
                                    <h4 class="post-title"><a href="https://injaby.com/showtag/{{ $Spost->id }}"
                                            style="font-size: 15px;">{{ $Spost->TITLE }}</a>
                                    </h4>
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item">
                                            {{-- {{ \Carbon\Carbon::parse($Spost->DATE)->format('H:i') }} --}}
                                        </li>
                                    </ul>
                                </div>
                                {{-- <a href="https://injaby.com/showtag/{{ $Spost->id }}"> --}}
                                <a href="/posts/{{ $Spost->id }}/show">
                                    <div class="thumb rounded">
                                        <div style="height: 230px" class="inner">
                                            <img src="{{ asset('storage/' . $Spost->IMG . '') }}"
                                                alt="{{ $Spost->TITLE }}" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">موضوعات تهمك</h3>
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">

                            <div class="col-sm-6">
                                @php
                                    $xx = 0;
                                @endphp
                                @foreach ($intersted as $Spost)
                                    @if ($xx <= 4)
                                        <!-- post -->

                                        <div class="post post-list-sm square">
                                            <div class="thumb rounded">
                                                <a href="/posts/{{ $Spost->id }}/show">
                                                    <div class="inner">
                                                        <img src="{{ asset('storage/' . $Spost->IMG . '') }}"
                                                            alt="{{ $Spost->TITLE }}" />
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix"
                                                style="display:flex;
                                                        min-height: 101px;
                                                        flex-direction: column;
                                                    ">
                                                <h6 class="post-title my-0"><a
                                                        href="/posts/{{ $Spost->id }}/show">{{ $Spost->TITLE }}</a>
                                                </h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">
                                                        {{ \Carbon\Carbon::parse($Spost->DATE)->format('H:i') }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @php
                                            $xx++;
                                        @endphp
                                        {{-- @endif

                                            @endif

                                    @endforeach --}}
                                    @endif
                                @endforeach


                            </div>

                            <div class="col-sm-6">

                                @if ($xx > 3)
                                    @foreach ($intersted as $key => $Spost)
                                        @if ($key > 3 && $key < 5)
                                            {{-- @foreach ($groups as $group)
                                        @if ($group->id == $Spost->TOPIC)
                                            @php
                                                $string = $group->TAG;
                                                $str_arr = explode(',', $string);
                                                $str_arr = array_filter($str_arr);
                                            @endphp
                                            @if (in_array(27, $str_arr) || in_array(9, $str_arr) || in_array(11, $str_arr) || in_array(26, $str_arr) || in_array(85, $str_arr)) --}}

                                            <!-- post -->
                                            <div class="post">
                                                <div class="thumb rounded">
                                                    <a href="/tags/{{ $Spost->TAG }}/show"
                                                        class="category-badge position-absolute">
                                                        @foreach ($tags as $tag)
                                                            @if ($tag->id == $Spost->TAG)
                                                                {{ $tag->TITLE }}
                                                            @endif
                                                        @endforeach
                                                    </a>
                                                    <a href="/posts/{{ $Spost->id }}/show">
                                                        <div class="inner">
                                                            <img src="{{ asset('storage/' . $Spost->IMG . '') }}"
                                                                alt="post-title" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <ul class="meta list-inline mt-4 mb-0">
                                                    <li class="list-inline-item">
                                                        {{ \Carbon\Carbon::parse($Spost->DATE)->format('H:i') }}
                                                    </li>
                                                </ul>
                                                <h5 class="post-title mb-3 mt-3"><a
                                                        href="/posts/{{ $Spost->id }}/show">{{ $Spost->TITLE }}</a>
                                                </h5>
                                                <p class="excerpt mb-0">
                                                    {{ \Illuminate\Support\Str::limit($singlepost->DESCRIPTION, 200, '...') }}

                                                </p>
                                            </div>
                                            @php
                                                $xx++;
                                            @endphp
                                            {{-- @endif --}}
                                        @endif
                                    @endforeach
                                @endif
                                {{-- @endforeach --}}
                            </div>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- horizontal ads -->
                    <div class="ads-horizontal text-md-center">
                        <span class="ads-title">- اعلان ممول -</span>
                        <a href="#">
                            <img src="{{ asset('main_page/images/ads/ad-750.png') }}" alt="Advertisement" />
                        </a>
                    </div>


                </div>


            </div>
        </div>
    </section>
    <style>
        .CATEGORYTEBKUM .post.post-over-content .post-title a {
            font-size: 21px !important;
        }
    </style>
    <section class="hero-carousel pt-5 CATEGORYTEBKUM">
        <div dir="rtl" class="container-xl pt-5">
            <div class="section-header">
                <h3 style="text-align: center;" class="section-title">أقسام طبكم</h3>
            </div>
            <div class="row">
                <!-- post -->
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title">
                            <?php

                            //   $alnfseh=App\Models\poststags::where("TITLE", '=', 'الصحة النفسية')->first()
                            //   $alnfseh=App\Models\poststags::where("TITLE", '=', 'الصحة النفسية')->first()
                            ?>
                            <a href="{{ route('videotags', ['id' => $TV->id]) }}">
                                طبكم TV
                            </a>
                        </h4>
                    </div>

                    <a href="{{ route('groupsecbyid', ['id' => $TV->id]) }}">
                        <div class="thumb2 rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;" src="{{ asset('storage/' . $TV->IMG . '') }}"
                                    alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>

                <!-- post -->
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="{{ route('groupsecbyid', ['id' => $Altebalbdel->id]) }}">أمراض الدم
                                </a></h4>
                    </div>
                    <a href="{{ route('tagbyid', ['id' => $Altebalbdel->id]) }}">
                        <div class="thumb2 rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;aspect-ratio:1  "
                                    src="{{ asset('img/Haematology-Clinic.jpg') }}" alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>

                <!-- post -->
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="{{ route('tagbyid', ['id' => $alnfseh->id]) }}"> الصحة
                                النفسية</a></h4>
                    </div>
                    <a href="{{ route('tagbyid', ['id' => $alnfseh->id]) }}">
                        <div class="thumb2 rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;"
                                    src="{{ asset('img/1683617820858 copy.jpg') }}"
                                    alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>


                <!-- post -->
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="{{ route('groupbyid', ['id' => $almrad->id]) }}">الأمراض</a></h4>
                    </div>
                    <a href="{{ route('tagbyid', ['id' => $almrad->id]) }}">
                        <div class="thumb2 rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;" src="{{ asset('img/coronavirus-2.tmb-479v.jpg') }}"
                                    alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>


                <!-- post -->   @php
$medical_id= App\Models\groups::where('TITLE', '=', 'موضوعات طبية')->first()->id;
                                @endphp
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="{{ route('groupbyid', ['id' =>$medical_id]) }}"> موضوعات طبية</a></h4>


                        {{-- <h4 class="post-title"><a href="{{ route('groupbyid', ['id' => App/Models/groups::where('TAG','LIKE','%'.$mudu3attbeh->id.'%')])->first() }}">موضوعات
                                طبية</a></h4> --}}
                    </div>
                    <a href="{{ route('groupbyid', ['id' => $medical_id]) }}}">
                        <div class="thumb2 rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;"
                                    src="{{ asset('img/stethoscope-doctor-md-medical-health-hospital.jpg') }}"
                                    alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>


                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">

                        <h4 class="post-title"><a href="{{ route('tagbyid', ['id' => $seconde_slider->id]) }}"> الأعشاب
                            </a></h4>
                    </div>
                    <a href="{{ route('tagbyid', ['id' => $seconde_slider->id]) }}">
                        <div class="thumb2 rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;" src="{{ asset('img/Herbs-1-e1598167694617.jpg') }}"
                                    alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>


                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="https://injaby.com/">إنجابي</a></h4>
                    </div>
                    <a href="https://injaby.com/">
                        <div class="thumb2 rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;" src="{{ asset('img/العطور-مختلفة-أثناء-الحمل-كنوز-الطيب-2-1.jpg') }}"
                                    alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>


                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        @php
                        $humanbody_id=  App\Models\groups::where('TITLE', '=', 'جسم الانسان')->first()->id;
                      @endphp
                        <h4 class="post-title"><a href="{{ route('groupbyid', ['id' =>$humanbody_id ]) }}"> جسم الانسان</a></h4>
                    </div>
                    <a href="{{ route('tagbyid', ['id' => $humanbody_id]) }}">
                        <div class="thumb2 rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;" src="{{ asset('img/Anatomy_share.jpg') }}"
                                    alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>



            </div>
        </div>
    </section>

    <div class="spacer" data-height="50"></div>


    <section id="hero">

        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-12">

                    <!-- post tabs -->
                    <div class="post-tabs rounded bordered">
                        <!-- tab navs -->
                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist"
                            style="flex-direction: row-reverse;">

                            <li class="nav-item" role="presentation"><button aria-selected="true"
                                    class="nav-link active" data-tag-title="الأعشاب" id="tag1"
                                    type="button">الأعشاب</button>
                            </li>
                            <li class="nav-item" role="presentation"><button aria-selected="true" class="nav-link"
                                    data-tag-title="سرطان الثدي" id="tag2" type="button">سرطان الثدي</button>
                            </li>
                            <li class="nav-item" role="presentation"><button aria-selected="true" class="nav-link"
                                    data-tag-title="التغذية" id="tag3" type="button">التغذية</button>
                            </li>
                            <li class="nav-item" role="presentation"><button aria-selected="true" class="nav-link"
                                    data-tag-title="الصحة النفسية" id="tag4" type="button">الصحة النفسية</button>
                            </li>
                            <li class="nav-item" role="presentation"><button aria-selected="true" class="nav-link"
                                    data-tag-title="البشرة" id="tag5" type="button">البشرة</button>
                            </li>
                            <li class="nav-item" role="presentation"><button aria-selected="true" class="nav-link"
                                    data-tag-title="الحساسية" id="tag6" type="button">الحساسية</button>
                            </li>
                            <li class="nav-item" role="presentation"><button aria-selected="true" class="nav-link"
                                    data-tag-title="أمراض الدم" id="tag6" type="button">أمراض الدم</button>
                            </li>
                            <li class="nav-item" role="presentation"><button aria-selected="true" class="nav-link"
                                    data-tag-title="طبكم TV" id="tag7" type="button"> طبكم TV</button>
                            </li>







                        </ul>
                        <!-- tab contents -->
                        <div class="tab-content" id="postsTabContent">
                            <!-- loader -->
                            <div class="lds-dual-ring"></div>
                            <!-- popular posts -->
                            <div class="tab-pane fade show ahmadaltameme active">
                                <div class="row">


                                </div>
                            </div>
                        </div>

                    </div>

                </div>

    </section>


    <section class="hero-carousel pt-5">
        <div class="container-xl pt-5">
            <div class="post-carousel-lg">
                <?php
                $xx = 0;
                ?>



                @php
                    $all_groupid_for_this_tag = [];

                    $Human_tags = explode(',', $Human);
                    foreach ($groups as $key => $group) {
                        $arry = explode(',', $group->TAG);
                        if ($arry[0] == $Human_tags[0]) {
                            $all_groupid_for_this_tag[] = $group->id;
                        }
                    }
                    $totalPosts = 0;
                @endphp
                @foreach ($all_groupid_for_this_tag as $groupID)
                    @php
                        $groupPosts = App\Models\Post::where('TOPIC', $groupID)
                            ->take(2)
                            ->get();
                    @endphp
                    @foreach ($groupPosts as $singlepost)
                        @if ($totalPosts < 8)
                            <div class="post featured-post-xl">
                                <div class="details clearfix">
                                    <a href="/tags/{{ $singlepost->tag->id }}/show" class="category-badge lg">
                                        {{ $singlepost->tag->TITLE }}
                                    </a>

                                    <h4 class="post-title">
                                        <a href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                    </h4>
                                </div>
                                <a href="/posts/{{ $singlepost->id }}/show">
                                    <div class="thumb rounded">
                                        <div class="inner data-bg-image"
                                            data-bg-image="{{ asset('storage/' . $singlepost->IMG) }}"></div>
                                    </div>
                                </a>
                            </div>
                            @php
                                $totalPosts++;
                            @endphp
                        @else
                        @break
                    @endif
                @endforeach
            @endforeach
            {{-- @endforeach --}}

        </div>
    </div>
    </div>
</section>
<section class="hero-carousel pt-5">
    <div dir="rtl" class="container-xl">
        <div class="row">
            <div class="section-header">
                <h3 class="section-title">موضوعات طبية</h3>
            </div>

            <div class="padding-30 rounded bordered">
                <div class="row gy-5">
                    <div class="col-sm-6">
                        <?php $totalPosts = 0;
                        $aaray_tag = ['الأدوية', 'الصحة الجنسية', 'السرطان'];
                        ?>
                        @foreach ($aaray_tag as $value)
                            <?php
                            $what = App\Models\poststags::where('TITLE', '=', $value)->first();
                            ?>
                            @foreach (App\Models\Post::where('TAG', '=', $what->id)->take(1)->get() as $singlepost)
                                @if ($totalPosts < 1)
                                    <div class="post">
                                        <div class="thumb rounded">
                                            <a href="/tags/{{ $singlepost->tag->id }}/show"
                                                class="category-badge position-absolute">{{ $singlepost->tag->TITLE }}</a>

                                            <a href="/posts/{{ $singlepost->id }}/show">
                                                <div class="inner">
                                                    <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                        alt="{{ $singlepost->TITLE }}" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-3 mt-3 "><a
                                                href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                        </h5>
                                        <p class="excerpt mb-0">
                                            {{ \Illuminate\Support\Str::limit($singlepost->DESCRIPTION, 200, '...') }}
                                        </p>
                                    </div>
                                    @php
                                        $totalPosts++;
                                    @endphp
                                @else
                                @break
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="col-sm-6">
                    <?php $xx = 0;
                    $aaray_tag = ['الأدوية', 'الصحة الجنسية', 'السرطان'];
                    ?>
                    @foreach ($aaray_tag as $value)
                        <?php
                        $what = App\Models\poststags::where('TITLE', '=', $value)->first();
                        ?>
                        @foreach (App\Models\Post::where('TAG', '=', $what->id)->take(2)->get() as $singlepost)
                            <div class="post post-list-sm square">
                                <div class="thumb rounded">
                                    <a href="/posts/{{ $singlepost->id }}/show">
                                        <div class="inner">
                                            <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                alt="{{ $singlepost->TITLE }}" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details clearfix"
                                    style="display: flex;
                                            min-height: 101px;
                                            flex-direction: column;">
                                    <h6 class="post-title my-0  "
                                        style="padding-left: 20px;
                                                line-height: 2;">
                                        <a href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                    </h6>
                                    <p dir="rtl"
                                        style="    color: #9faabb;
                                                        font-size: 12px;">
                                        {{ \Illuminate\Support\Str::limit($singlepost->DESCRIPTION, 80, '...') }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>


        <div class="spacer" data-height="50"></div>
    </div>
</div>
</section>


<section dir="rtl" class="hero-carousel pt-5">
<div dir="rtl" class="container-xl">
    <div class="section-header">
        <h3 class="section-title">شاهد أيضًا</h3>
    </div>
    <div class="container-xl pt-5">

        <div class="row">
            <div dir="ltr" class="col-lg-6 col-md-6 col-sm-12 columnalso"
                style="    margin-top: 13px;    margin-left: -5%;">
                <div class="widget-content">

                    <div style="text-align: right;" class="post post-carousel">
                        <div style="max-width:500px; text-align: right;" class="thumb rounded"
                            style="    width: 100%!important;">
                            <a href="/posts/{{ $onepost->id }}/show">
                                <div style="    width: 100%;
                                                            margin: 0 0 0 50px;"
                                    class="inner">
                                    <img src="{{ asset('storage/' . $onepost->IMG . '') }}"
                                        alt="{{ $onepost->TITLE }}" />
                                </div>
                            </a>
                        </div>
                        <h5 class="post-title mb-0 mt-4 h55 noot"><a href="/posts/{{ $onepost->id }}/show"
                                style="color: white;">
                                {{ $onepost->TITLE }}</a>

                        </h5>
                        </ul>
                    </div>

                    {{--
                                                 @else
                                                 @foreach ($tags as $tag)
                                                 @if ($tag->posts)
                                                 @foreach ($tag->posts as $Spost)



                                                 <!-- post -->
                                                 @if (isset($Spost))



                                                 <div style="text-align: right;" class="post post-carousel">
                                                     <div style="max-width:500px; text-align: right;"
                                                         class="thumb rounded" style="    width: 100%!important;">
                                                         <a href="/posts/{{ $Spost->id }}/show">
                                                             <div style="    width: 100%;
                                                             margin: 0 0 0 50px;" class="inner">
                                                                 <img src="{{ asset('storage/' . $Spost->IMG . '') }}"
                                                                     alt="{{ $Spost->TITLE }}" />
                                                             </div>
                                                         </a>
                                                     </div>
                                                     <h5 class="post-title mb-0 mt-4 h55 noot" ><a
                                                             href="/posts/{{ $Spost->id }}/show" style="color: white;">
                                                             {{ $Spost->TITLE }}</a>

                                                     </h5>
                                                     </ul>
                                                 </div>
                                                @endif

                                                @endif --}}
                    {{-- @endif --}}
                    {{-- @endif
                                @endforeach --}}
                    {{-- @endforeach --}}

                    {{-- @endforeach --}}


                    {{-- </div> --}}

                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 title34">

                {{-- @for ($i = 0; $i < 3; $i++) --}}



                <div class="row">
                    <div class="col-6">

                        <div>
                            @php $count = 0; @endphp
                            @foreach ($tags_in_one_Arry as $singlepost)
                                @if (isset($singlepost->id))
                                    <div class="post post-over-content pt-3" style="text-align: center;">
                                        <div class="details clearfix">
                                            <a href="/tags/{{ $singlepost->tag->id }}/show" class="category-badge lg">
                                                {{ $singlepost->tag->TITLE }}
                                            </a>
                                            <p style="margin: -19px 0; font-size: 15px; padding-top: 20px" class="post-title">
                                                <a href="/posts/{{ $singlepost->id }}/show">
                                                    {{ Str::limit($singlepost->DESCRIPTION, 40) }}
                                                </a>
                                            </p>
                                        </div>
                                        <a href="/posts/{{ $singlepost->id }}/show">
                                            <div class="thumb rounded">
                                                <div style="height: 180px;" class="inner">
                                                    <img style="border-radius: 7px;" src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                        alt="{{ $singlepost->TITLE }}" />
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @php $count++; @endphp
                                @endif

                                @if ($count == 3)
                                    @break
                                @endif
                            @endforeach
                        </div>
                        </div>
                        <div class="col-6">
                            @php $count = 0; @endphp

                            @foreach ($tags_in_one_Arry as $singlepost)
                                @if (isset($singlepost->id))
                                    @if ($count >= 3)
                                        <div class="post post-over-content pt-3" style="text-align: center;">
                                            <div class="details clearfix">
                                                <a href="/tags/{{ $singlepost->tag->id }}/show" class="category-badge lg">
                                                    {{ $singlepost->tag->TITLE }}
                                                </a>
                                                <p style="margin: -19px 0; font-size: 15px; padding-top: 20px" class="post-title">
                                                    @if (isset($singlepost->id))
                                                        <a href="/posts/{{ $singlepost->id }}/show">
                                                            {{ Str::limit($singlepost->TITLE, 40) }}
                                                        </a>
                                                    @endif
                                                </p>
                                            </div>
                                            <a href="/posts/{{ $singlepost->id }}/show">
                                                <div class="thumb rounded">
                                                    <div style="height: 180px;" class="inner">
                                                        <img style="border-radius: 7px;"
                                                            src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                            alt="{{ $singlepost->TITLE }}" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @php $count++; @endphp
                                @endif
                            @endforeach
                        </div>


                </div>
                {{-- @endfor --}}
                {{-- <div class="row">
                        <div class="col-6">

                            @php
                                $xx = 0;
                            @endphp
                            @foreach ($posts as $Spost)
                                @foreach ($groups as $group)
                                    @if ($group->id == $Spost->TOPIC)
                                        @php
                                            $string = $group->TAG;
                                            $str_arr = explode(',', $string);
                                            $str_arr = array_filter($str_arr);
                                        @endphp
                                        @if (in_array(157, $str_arr))
                                            @if ($xx == 0)
                                                <div class="post post-over-content pt-3" style="text-align: center;">
                                                    <div class="details clearfix">
                                                        @foreach ($groups as $group)
                                                            @if ($group->id == $Spost->TOPIC)
                                                                <?php
                                                                $string = $group->TAG;
                                                                $str_arr = explode(',', $string);
                                                                $str_arr = array_filter($str_arr);

                                                                ?>

                                                                @foreach ($tags as $singletag)
                                                                    @if (end($str_arr) == $singletag->id)
                                                                        <a href="/tags/{{ $singletag->id }}/show"
                                                                            class="category-badge lg">{{ $singletag->TITLE }}</a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                        <p style="margin: -19px 0; font-size: 15px; padding-top: 20px"
                                                            class="post-title"><a
                                                                href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 40) }}</a>
                                                        </p>
                                                    </div>
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <div class="thumb rounded">
                                                            <div style="height: 180px;" class="inner">
                                                                <img style="border-radius: 7px;"
                                                                    src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                    alt="{{ $singlepost->TITLE }}" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                            @php
                                                $xx++;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div class="col-6">

                            @php
                                $xx = 0;
                            @endphp
                            @foreach ($posts as $Spost)
                                @foreach ($groups as $group)
                                    @if ($group->id == $Spost->TOPIC)
                                        @php
                                            $string = $group->TAG;
                                            $str_arr = explode(',', $string);
                                            $str_arr = array_filter($str_arr);
                                        @endphp
                                        @if (in_array(160, $str_arr))
                                            @if ($xx == 0)
                                                <div class="post post-over-content pt-3" style="text-align: center;">
                                                    <div class="details clearfix">
                                                        @foreach ($groups as $group)
                                                            @if ($group->id == $singlepost->TOPIC)
                                                                <?php
                                                                $string = $group->TAG;
                                                                $str_arr = explode(',', $string);
                                                                $str_arr = array_filter($str_arr);

                                                                ?>

                                                                @foreach ($tags as $singletag)
                                                                    @if (end($str_arr) == $singletag->id)
                                                                        <a href="/tags/{{ $singletag->id }}/show"
                                                                            class="category-badge lg">{{ $singletag->TITLE }}</a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                        <p style="margin: -19px 0; font-size: 15px; padding-top: 20px"
                                                            class="post-title"><a
                                                                href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 40) }}</a>
                                                        </p>
                                                    </div>
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <div class="thumb rounded">
                                                            <div style="height: 180px;" class="inner">
                                                                <img style="border-radius: 7px;"
                                                                    src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                    alt="{{ $singlepost->TITLE }}" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                            @php
                                                $xx++;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">

                            @php
                                $xx = 0;
                            @endphp
                            @foreach ($posts as $Spost)
                                @foreach ($groups as $group)
                                    @if ($group->id == $Spost->TOPIC)
                                        @php
                                            $string = $group->TAG;
                                            $str_arr = explode(',', $string);
                                            $str_arr = array_filter($str_arr);
                                        @endphp
                                        @if (in_array(157, $str_arr))
                                            @if ($xx == 0)
                                                <div class="post post-over-content pt-3" style="text-align: center;">
                                                    <div class="details clearfix">
                                                        @foreach ($groups as $group)
                                                            @if ($group->id == $singlepost->TOPIC)
                                                                <?php
                                                                $string = $group->TAG;
                                                                $str_arr = explode(',', $string);
                                                                $str_arr = array_filter($str_arr);

                                                                ?>

                                                                @foreach ($tags as $singletag)
                                                                    @if (end($str_arr) == $singletag->id)
                                                                        <a href="/tags/{{ $singletag->id }}/show"
                                                                            class="category-badge lg">{{ $singletag->TITLE }}</a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                        <p style="margin: -19px 0; font-size: 15px; padding-top: 20px"
                                                            class="post-title"><a
                                                                href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 40) }}</a>
                                                        </p>
                                                    </div>
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <div class="thumb rounded">
                                                            <div style="height: 180px;" class="inner">
                                                                <img style="border-radius: 7px;"
                                                                    src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                    alt="{{ $singlepost->TITLE }}" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                            @php
                                                $xx++;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        <div class="col-6">

                            @php
                                $xx = 0;
                            @endphp
                            @foreach ($posts as $Spost)
                                @foreach ($groups as $group)
                                    @if ($group->id == $Spost->TOPIC)
                                        @php
                                            $string = $group->TAG;
                                            $str_arr = explode(',', $string);
                                            $str_arr = array_filter($str_arr);
                                        @endphp
                                        @if (in_array(160, $str_arr))
                                            @if ($xx == 0)
                                                <div class="post post-over-content pt-3" style="text-align: center;">
                                                    <div class="details clearfix">
                                                        @foreach ($groups as $group)
                                                            @if ($group->id == $singlepost->TOPIC)
                                                                <?php
                                                                $string = $group->TAG;
                                                                $str_arr = explode(',', $string);
                                                                $str_arr = array_filter($str_arr);

                                                                ?>

                                                                @foreach ($tags as $singletag)
                                                                    @if (end($str_arr) == $singletag->id)
                                                                        <a href="/tags/{{ $singletag->id }}/show"
                                                                            class="category-badge lg">{{ $singletag->TITLE }}</a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                        <p style="margin: -19px 0; font-size: 15px; padding-top: 20px"
                                                            class="post-title"><a
                                                                href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 40) }}</a>
                                                        </p>
                                                    </div>
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <div class="thumb rounded">
                                                            <div style="height: 180px;" class="inner">
                                                                <img style="border-radius: 7px;"
                                                                    src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                    alt="{{ $singlepost->TITLE }}" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endif
                                            @php
                                                $xx++;
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                    </div> --}}

            </div>
        </div>
        {{-- <div class="row">
                <div class="col-3">

                    @php
                        $xx = 0;
                    @endphp
                    @foreach ($posts as $Spost)
                        @foreach ($groups as $group)
                            @if ($group->id == $Spost->TOPIC)
                                @php
                                    $string = $group->TAG;
                                    $str_arr = explode(',', $string);
                                    $str_arr = array_filter($str_arr);
                                @endphp
                                @if (in_array(165, $str_arr))
                                    @if ($xx == 0)
                                        <div class="post post-over-content pt-3" style="text-align: center;">
                                            <div class="details clearfix">
                                                @foreach ($groups as $group)
                                                    @if ($group->id == $singlepost->TOPIC)
                                                        <?php
                                                        $string = $group->TAG;
                                                        $str_arr = explode(',', $string);
                                                        $str_arr = array_filter($str_arr);

                                                        ?>

                                                        @foreach ($tags as $singletag)
                                                            @if (end($str_arr) == $singletag->id)
                                                                <a href="/tags/{{ $singletag->id }}/show"
                                                                    class="category-badge lg">{{ $singletag->TITLE }}</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <p style="margin: -19px 0; font-size: 15px; padding-top: 20px"
                                                    class="post-title"><a
                                                        href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 40) }}</a>
                                                </p>
                                            </div>
                                            <a href="/posts/{{ $singlepost->id }}/show">
                                                <div class="thumb rounded">
                                                    <div style="height: 180px;" class="inner">
                                                        <img style="border-radius: 7px;"
                                                            src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                            alt="{{ $singlepost->TITLE }}" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @php
                                        $xx++;
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="col-3">

                    @php
                        $xx = 0;
                    @endphp
                    @foreach ($posts as $Spost)
                        @foreach ($groups as $group)
                            @if ($group->id == $Spost->TOPIC)
                                @php
                                    $string = $group->TAG;
                                    $str_arr = explode(',', $string);
                                    $str_arr = array_filter($str_arr);
                                @endphp
                                @if (in_array(155, $str_arr))
                                    @if ($xx == 0)
                                        <div class="post post-over-content pt-3" style="text-align: center;">
                                            <div class="details clearfix">
                                                @foreach ($groups as $group)
                                                    @if ($group->id == $singlepost->TOPIC)
                                                        <?php
                                                        $string = $group->TAG;
                                                        $str_arr = explode(',', $string);
                                                        $str_arr = array_filter($str_arr);

                                                        ?>

                                                        @foreach ($tags as $singletag)
                                                            @if (end($str_arr) == $singletag->id)
                                                                <a href="/tags/{{ $singletag->id }}/show"
                                                                    class="category-badge lg">{{ $singletag->TITLE }}</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <p style="margin: -19px 0; font-size: 15px; padding-top: 20px"
                                                    class="post-title"><a
                                                        href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 40) }}</a>
                                                </p>
                                            </div>
                                            <a href="/posts/{{ $singlepost->id }}/show">
                                                <div class="thumb rounded">
                                                    <div style="height: 180px;" class="inner">
                                                        <img style="border-radius: 7px;"
                                                            src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                            alt="{{ $singlepost->TITLE }}" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @php
                                        $xx++;
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="col-3">

                    @php
                        $xx = 0;
                    @endphp
                    @foreach ($posts as $Spost)
                        @foreach ($groups as $group)
                            @if ($group->id == $Spost->TOPIC)
                                @php
                                    $string = $group->TAG;
                                    $str_arr = explode(',', $string);
                                    $str_arr = array_filter($str_arr);
                                @endphp
                                @if (in_array(154, $str_arr))
                                    @if ($xx == 0)
                                        <div class="post post-over-content pt-3" style="text-align: center;">
                                            <div class="details clearfix">
                                                @foreach ($groups as $group)
                                                    @if ($group->id == $singlepost->TOPIC)
                                                        <?php
                                                        $string = $group->TAG;
                                                        $str_arr = explode(',', $string);
                                                        $str_arr = array_filter($str_arr);

                                                        ?>

                                                        @foreach ($tags as $singletag)
                                                            @if (end($str_arr) == $singletag->id)
                                                                <a href="/tags/{{ $singletag->id }}/show"
                                                                    class="category-badge lg">{{ $singletag->TITLE }}</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <p style="margin: -19px 0; font-size: 15px; padding-top: 20px"
                                                    class="post-title"><a
                                                        href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 40) }}</a>
                                                </p>
                                            </div>
                                            <a href="/posts/{{ $singlepost->id }}/show">
                                                <div class="thumb rounded">
                                                    <div style="height: 180px;" class="inner">
                                                        <img style="border-radius: 7px;"
                                                            src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                            alt="{{ $singlepost->TITLE }}" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @php
                                        $xx++;
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
                <div class="col-3">

                    @php
                        $xx = 0;
                    @endphp
                    @foreach ($posts as $Spost)
                        @foreach ($groups as $group)
                            @if ($group->id == $Spost->TOPIC)
                                @php
                                    $string = $group->TAG;
                                    $str_arr = explode(',', $string);
                                    $str_arr = array_filter($str_arr);
                                @endphp
                                @if (in_array(150, $str_arr))
                                    @if ($xx == 0)
                                        <div class="post post-over-content pt-3" style="text-align: center;">
                                            <div class="details clearfix">
                                                @foreach ($groups as $group)
                                                    @if ($group->id == $singlepost->TOPIC)
                                                        <?php
                                                        $string = $group->TAG;
                                                        $str_arr = explode(',', $string);
                                                        $str_arr = array_filter($str_arr);

                                                        ?>

                                                        @foreach ($tags as $singletag)
                                                            @if (end($str_arr) == $singletag->id)
                                                                <a href="/tags/{{ $singletag->id }}/show"
                                                                    class="category-badge lg">{{ $singletag->TITLE }}</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <p style="margin: -19px 0; font-size: 15px; padding-top: 20px"
                                                    class="post-title"><a
                                                        href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 40) }}</a>
                                                </p>
                                            </div>
                                            <a href="/posts/{{ $singlepost->id }}/show">
                                                <div class="thumb rounded">
                                                    <div style="height: 180px;" class="inner">
                                                        <img style="border-radius: 7px;"
                                                            src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                            alt="{{ $singlepost->TITLE }}" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                    @php
                                        $xx++;
                                    @endphp
                                @endif
                            @endif
                        @endforeach
                    @endforeach
                </div>
            </div> --}}
    </div>
</div>
</section>

<script src="{{ asset('main_page/js/jquery.sticky-sidebar.min.js') }}"></script>

<script>
    $(document).ready(function() {
        "use strict";

        /*=========================================================================
            Slick sliders
        =========================================================================*/
        $('.common-slider').slick({
            dots: false,
            arrows: false,
            slidesToShow: 2,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: false,
                        arrows: false,
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                        arrows: false,
                    }
                }
            ]
        });

        // Custom carousel nav
        $('.carousel-topNav-prev').click(function() {
            $('.common-slider').slick('slickPrev');
        });
        $('.carousel-topNav-next').click(function() {
            $('.common-slider').slick('slickNext');
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // document.querySelector(".preloader").style.display = "none";
        document.querySelector(".preloader").style.display = "none";

        // Store initial content
        var initialContent = document.querySelector('.ahmadaltameme').innerHTML;

        // Function to fetch content based on tag title
        function fetchContent(tagTitle) {
            var loader = document.querySelector('.preloadd');
            loader.style.display = 'block';

            // Fetch content using the fetch API
            fetch('/fetch-content?tagTitle=' + tagTitle)
                .then(function(response) {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json(); // Return the parsed JSON
                })
                .then(function(data) {
                    loader.style.display = 'none';
                    console.log(data);
                    document.querySelector('.ahmadaltameme').innerHTML = data.content;
                })
                .catch(function(error) {
                    console.error(error);
                    document.querySelector('.ahmadaltameme').innerHTML = '<p>لا يوجد عناصر لعرضها</p>';
                });
        }

        // Attach click event to buttons
        document.querySelectorAll('button[id^="tag"]').forEach(function(button) {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                document.querySelectorAll('button[id^="tag"]').forEach(function(otherButton) {
                    otherButton.classList.remove('active');
                    otherButton.style.backgroundColor = '';
                    otherButton.style.color = '';
                });

                // Add active class to the clicked button
                button.classList.add('active');
                button.style.backgroundColor = '#70b646';
                button.style.color = '#111111';

                var tagTitle = button.getAttribute('data-tag-title');
                fetchContent(tagTitle);
            });
        });

        // Fetch content for tag1 on page load and set it as active
        var tag1Button = document.getElementById('tag1');
        tag1Button.classList.add('active');
        tag1Button.style.backgroundColor = '#70b646';
        tag1Button.style.color = '#111111';
        fetchContent('الأعشاب');
    });

    var slickNextButton = document.querySelector('.slick-next');

    setTimeout(function() {
        if (slickNextButton) {
            slickNextButton.click();
        }
    }, 3000);
</script>



@endsection
