@extends('layouts.welcome')

@section('content')
    <section class="hero-carousel pt-5">
        <div class="container-xl">
            <div class="row">
                <div class="col-8">
                    <div class="post-carousel-lg">
                        <?php
                        $xx = 0;
                        ?>
                        @foreach ($posts as $singlepost)
                            @if (1)
                                @if ($xx <= 7)
                                    <!-- post -->
                                    <div class="post featured-post-xl">
                                        <div class="details clearfix">
                                            @foreach ($groups as $group)
                                                @if ($group->id == $singlepost->TOPIC)
                                                    <?php
                                                    $string = $group->TAG;
                                                    $str_arr = explode(',', $string);
                                                    ?>

                                                    @foreach ($tags as $singletag)
                                                        @if (end($str_arr) == $singletag->id)
                                                            <a href="/tags/{{ $singletag->id }}/show"
                                                                class="category-badge lg">{{ $singletag->TITLE }}</a>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                            <h4 class="post-title"><a
                                                    href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                            </h4>
                                        </div>
                                        <a href="/posts/{{ $singlepost->id }}/show">
                                            <div class="thumb rounded">
                                                <div class="inner data-bg-image"
                                                    data-bg-image="{{ asset('storage/' . $singlepost->IMG . '') }}"></div>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                <?php
                                $xx++;
                                ?>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-4">
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
                            <div class="lds-dual-ring"></div>
                            <!-- popular posts -->
                            <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular"
                                role="tabpanel">
                                <?php
                                $xx = 0;
                                ?>
                                @foreach ($posts as $singlepost)
                                    @if (1)
                                        @if ($xx <= 3)
                                            <div class="post post-over-content pt-3" style="text-align: center;">
                                                <div class="details clearfix">
                                                    <p style="margin: -11px 0" class="post-title"><a
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
                                        @endif
                                        <?php
                                        $xx++;
                                        ?>
                                    @endif
                                @endforeach
                            </div>
                            <!-- recent posts -->
                            <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                <?php
                                $xx = 0;
                                ?>
                                @foreach ($posts as $singlepost)
                                    @if (1)
                                        @if ($xx <= 7 && $xx > 3)
                                            <div class="post post-over-content pt-3" style="text-align: center;">
                                                <div class="details clearfix">
                                                    <p style="margin: -11px 0" class="post-title"><a
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
                                        @endif
                                        <?php
                                        $xx++;
                                        ?>
                                    @endif
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
                                <p class="mb-4">نعمل في طبكم لتوفير المعلومات الطبية والصحية الموثوقة والشاملة للقارئ
                                    العربي أينما كان، وتؤمن بحق الجميع في المعرفة والوصول إلى المعلومات بيسر وسهولة</p>
                                <ul class="social-icons list-unstyled list-inline mb-0">
                                    <li class="list-inline-item"><a href="https://www.facebook.com/tabkom"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="https://twitter.com/Tebkum"><i
                                                class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.youtube.com/@Tebkum"><i
                                                class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- widget post carousel -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">المستشار الطبي</h3>
                            </div>
                            <div class="widget-content">
                                <div class="post-carousel-widget">
                                    <?php
                                    $xx = 0;
                                    ?>
                                    @foreach ($posts as $singlepost)
                                        @if ($singlepost->TOPIC == '4')
                                            @if ($xx <= 15)
                                                <!-- post -->
                                                <div class="post post-carousel">
                                                    <div class="thumb rounded">
                                                        <a href="/tags/{{ $singlepost->TOPIC }}/show"
                                                            class="category-badge position-absolute">
                                                            @foreach ($tags as $tag)
                                                                @if ($tag->id == $singlepost->TOPIC)
                                                                    {{ $tag->TITLE }}
                                                                @endif
                                                            @endforeach
                                                        </a>
                                                        <a href="/posts/{{ $singlepost->id }}/show">
                                                            <div class="inner">
                                                                <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                    alt="{{ $singlepost->TITLE }}" />
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <h5 class="post-title mb-0 mt-4"><a
                                                            href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                                    </h5>
                                                    <li class="list-inline-item">
                                                        {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}
                                                    </li>
                                                    </ul>
                                                </div>
                                            @endif
                                            <?php
                                            $xx++;
                                            ?>
                                        @endif
                                    @endforeach



                                </div>
                                <!-- carousel arrows -->
                                <div class="slick-arrows-bot">
                                    <button type="button" data-role="none"
                                        class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i
                                            class="icon-arrow-left"></i></button>
                                    <button type="button" data-role="none"
                                        class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i
                                            class="icon-arrow-right"></i></button>
                                </div>
                            </div>
                        </div>


                        <!-- widget categories -->
                        {{-- <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">أكثر الأقسام مشاهدة</h3>
                            </div>
                            <div class="widget-content">
                                <ul class="list">
                                    <?php
                                    $xx = 0;
                                    ?>
                                    @foreach ($mosttags as $mosttag)
                                        @if ($xx <= 6)
                                            <li><a
                                                    href="/tags/{{ $mosttag->id }}/show">{{ $mosttag->TITLE }}</a><span>({{ $mosttag->REED }})</span>
                                            </li>
                                        @endif
                                        <?php
                                        $xx++;
                                        ?>
                                    @endforeach
                                </ul>
                            </div>

                        </div> --}}


                        <!-- widget post carousel -->
                        {{-- <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">الأعشاب</h3>
                            </div>
                            <div class="widget-content">
                                <div class="post-carousel-widget">
                                    <?php
                                    $xx = 0;
                                    ?>
                                    @foreach ($posts as $singlepost)
                                        @if ($singlepost->TOPIC == '1')
                                            @if ($xx <= 4)
                                                <!-- post -->
                                                <div class="post post-carousel">
                                                    <div class="thumb rounded">
                                                        <a href="/tags/{{ $singlepost->TOPIC }}/show"
                                                            class="category-badge position-absolute">
                                                            @foreach ($tags as $tag)
                                                                @if ($tag->id == $singlepost->TOPIC)
                                                                    {{ $tag->TITLE }}
                                                                @endif
                                                            @endforeach
                                                        </a>
                                                        <a href="/posts/{{ $singlepost->id }}/show">
                                                            <div class="inner">
                                                                <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                    alt="{{ $singlepost->TITLE }}" />
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <h5 class="post-title mb-0 mt-4"><a
                                                            href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                                    </h5>
                                                    <li class="list-inline-item">
                                                        {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}
                                                    </li>
                                                    </ul>
                                                </div>
                                            @endif
                                            <?php
                                            $xx++;
                                            ?>
                                        @endif
                                    @endforeach



                                </div>
                                <!-- carousel arrows -->
                                <div class="slick-arrows-bot">
                                    <button type="button" data-role="none"
                                        class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i
                                            class="icon-arrow-left"></i></button>
                                    <button type="button" data-role="none"
                                        class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i
                                            class="icon-arrow-right"></i></button>
                                </div>
                            </div>
                        </div> --}}

                        <!-- widget advertisement -->
                        <div class="widget no-container rounded text-md-center">
                            <span class="ads-title">- اعلان ممول -</span>
                            <a href="#" class="widget-ads">
                                <img src="{{ asset('main_page/images/ads/ad-360.png') }}" alt="Advertisement" />
                            </a>
                        </div>

                        <!-- widget tags -->
                        {{-- <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">آخر التصنيفات</h3>
                            </div>
                            <div class="widget-content">
                                <?php
                                $xx = 0;
                                ?>
                                @foreach ($tags as $mosttag)
                                    @if ($xx <= 6)
                                        <a href="/tags/{{ $mosttag->id }}/show"
                                            class="tag">#{{ $mosttag->TITLE }}</a>
                                    @endif
                                    <?php
                                    $xx++;
                                    ?>
                                @endforeach
                            </div>
                        </div> --}}

                    </div>

                </div>

                <div class="col-lg-8">


                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">الأسنان</h3>
                        <div class="slick-arrows-top pt-5  pt-5">
                            <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons"
                                aria-label="Previous"><i class="icon-arrow-left"></i></button>
                            <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons"
                                aria-label="Next"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="row post-carousel-twoCol post-carousel">

                        <?php
                        $xx = 0;
                        ?>
                        @foreach ($posts as $singlepost)
                            @if ($singlepost->TOPIC == '14')
                                @if ($xx <= 4)
                                <div class="post">
                                    <div class="thumb rounded">
                                        <a href="/tags/{{ $singlepost->TOPIC }}/show"
                                            class="category-badge position-absolute">
                                            @foreach ($tags as $tag)
                                                @if ($tag->id == $singlepost->TOPIC)
                                                    {{ $tag->TITLE }}
                                                @endif
                                            @endforeach
                                        </a>
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
                                            href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 60) }}</a></h5>
                                    <p class="excerpt mb-0">{{ Str::limit($singlepost->DESCRIPTION, 150) }}</p>
                                </div>

                                @endif
                                <?php
                                $xx++;
                                ?>
                            @endif
                        @endforeach


                    </div>

                    <div class="spacer" data-height="50"></div>


                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">الأسنان</h3>
                        <div class="slick-arrows-top pt-5  pt-5">
                            <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons"
                                aria-label="Previous"><i class="icon-arrow-left"></i></button>
                            <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons"
                                aria-label="Next"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>

                    <div class="row post-carousel-twoCol post-carousel">
                        <?php
                        $xx = 0;
                        ?>
                        @foreach ($posts as $singlepost)
                            @if ($singlepost->TOPIC == '14')
                                @if ($xx <= 4)



                                    <!-- post -->
                                    <div class="post post-over-content col-md-6">
                                        <div class="details clearfix">
                                            <a href="/tags/{{ $singlepost->TOPIC }}/show" class="category-badge">
                                                @foreach ($tags as $tag)
                                                    @if ($tag->id == $singlepost->TOPIC)
                                                        {{ $tag->TITLE }}
                                                    @endif
                                                @endforeach
                                            </a>
                                            <h4 class="post-title"><a
                                                    href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                            </h4>
                                            <ul class="meta list-inline mb-0">
                                                <li class="list-inline-item">
                                                    {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}</li>
                                            </ul>
                                        </div>
                                        <a href="/posts/{{ $singlepost->id }}/show">
                                            <div class="thumb rounded">
                                                <div style="max-height: 250px" class="inner">
                                                    <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                        alt="{{ $singlepost->TITLE }}" />
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                @endif
                                <?php
                                $xx++;
                                ?>
                            @endif
                        @endforeach
                    </div>
                    <div class="spacer" data-height="50"></div>






                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">آخر المقالات</h3>
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">

                            <div class="col-sm-6">

                                @for ($i = 1; $i <= 4; $i++)
                                    <!-- post -->
                                    <div class="post post-list-sm square">
                                        <div class="thumb rounded">
                                            <a href="/posts/{{ $posts[$i]->id }}/show">
                                                <div class="inner">
                                                    <img src="{{ asset('storage/' . $posts[$i]->IMG . '') }}"
                                                        alt="{{ $posts[$i]->TITLE }}" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a
                                                    href="/posts/{{ $posts[$i]->id }}/show">{{ $posts[$i]->TITLE }}</a>
                                            </h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">
                                                    {{ \Carbon\Carbon::parse($posts[$i]->DATE)->format('H:i') }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endfor

                            </div>
                            <div class="col-sm-6">
                                <!-- post -->
                                <div class="post">
                                    <div class="thumb rounded">
                                        <a href="/tags/{{ $posts[0]->TOPIC }}/show"
                                            class="category-badge position-absolute">
                                            @foreach ($tags as $tag)
                                                @if ($tag->id == $posts[0]->TOPIC)
                                                    {{ $tag->TITLE }}
                                                @endif
                                            @endforeach
                                        </a>
                                        <a href="/posts/{{ $posts[0]->id }}/show">
                                            <div class="inner">
                                                <img src="{{ asset('storage/' . $posts[0]->IMG . '') }}"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
                                        <li class="list-inline-item">
                                            {{ \Carbon\Carbon::parse($posts[0]->DATE)->format('H:i') }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a
                                            href="/posts/{{ $posts[0]->id }}/show">{{ $posts[0]->TITLE }}</a></h5>
                                    <p class="excerpt mb-0">{{ $posts[0]->DESCRIPTION }}</p>
                                </div>

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

                    {{-- <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">الأخبار الطبية</h3>
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">
                            <div class="col-sm-6">
                                <?php
                                $xx = 0;
                                ?>
                                @foreach ($posts as $singlepost)
                                    @if ($singlepost->TOPIC == '2' && !($singlepost->id % 2 == 0))
                                        @if ($xx <= 0)
                                            <!-- post large -->
                                            <div class="post">
                                                <div class="thumb rounded">
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <div class="inner">
                                                            <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                alt="{{ $singlepost->TITLE }}" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <ul class="meta list-inline mt-4 mb-0">
                                                    <li class="list-inline-item">
                                                        {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}
                                                    </li>
                                                </ul>
                                                <h5 class="post-title my-0"><a
                                                        href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                                </h5>
                                                <p class="excerpt mb-0">{{ $singlepost->DESCRIPTION }}</p>
                                            </div>
                                        @elseif ($xx <= 3)
                                            <!-- post -->
                                            <div class="post post-list-sm square before-seperator">
                                                <div class="thumb rounded">
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <div class="inner">
                                                            <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                alt="{{ $singlepost->TITLE }}" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="details clearfix">
                                                    <h6 class="post-title my-0"><a
                                                            href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                                    </h6>
                                                    <ul class="meta list-inline mt-1 mb-0">
                                                        <li class="list-inline-item">
                                                            {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                        <?php
                                        $xx++;
                                        ?>
                                    @endif
                                @endforeach
                            </div>
                            <div class="col-sm-6">

                                <?php
                                $xx = 0;
                                ?>
                                @foreach ($posts as $singlepost)
                                    @if ($singlepost->TOPIC == '2' && $singlepost->id % 2 == 0)
                                        @if ($xx <= 0)
                                            <!-- post large -->
                                            <div class="post">
                                                <div class="thumb rounded">
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <div class="inner">
                                                            <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                alt="{{ $singlepost->TITLE }}" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <ul class="meta list-inline mt-4 mb-0">
                                                    <li class="list-inline-item">
                                                        {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}
                                                    </li>
                                                </ul>
                                                <h5 class="post-title my-0"><a
                                                        href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                                </h5>
                                                <p class="excerpt mb-0">{{ $singlepost->DESCRIPTION }}</p>
                                            </div>
                                        @elseif ($xx <= 3)
                                            <!-- post -->
                                            <div class="post post-list-sm square before-seperator">
                                                <div class="thumb rounded">
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <div class="inner">
                                                            <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                alt="{{ $singlepost->TITLE }}" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="details clearfix">
                                                    <h6 class="post-title my-0"><a
                                                            href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                                    </h6>
                                                    <ul class="meta list-inline mt-1 mb-0">
                                                        <li class="list-inline-item">
                                                            {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        @endif
                                        <?php
                                        $xx++;
                                        ?>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>


                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">الحمل و الولادة</h3>
                    </div>

                    <div class="padding-30 rounded bordered">

                        <div class="row">
                            <?php
                            $xx = 0;
                            ?>
                            @foreach ($posts as $singlepost)
                                @if ($singlepost->TOPIC == '5')
                                    @if ($xx <= 4)
                                        <div class="col-md-12 col-sm-6">
                                            <!-- post -->
                                            <div class="post post-list clearfix">
                                                <div class="thumb rounded">
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <div class="inner">
                                                            <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                alt="{{ $singlepost->TITLE }}" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="details">
                                                    <ul class="meta list-inline mb-3">
                                                        <li class="list-inline-item">
                                                            {{ \Carbon\Carbon::parse($singlepost->DATE)->format('H:i') }}
                                                        </li>
                                                    </ul>
                                                    <h5 class="post-title"><a href="/posts/{{ $singlepost->id }}/show">
                                                            {{ $singlepost->TITLE }}</a></h5>
                                                    <p class="excerpt mb-0">{{ $singlepost->DESCRIPTION }}</p>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <?php
                                    $xx++;
                                    ?>
                                @endif
                            @endforeach




                        </div>


                    </div> --}}

                </div>


            </div>
        </div>
    </section>

    <section class="hero-carousel pt-5">
        <div dir="rtl" class="container-xl">
            <div class="row pt-5">
                <!-- post -->
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="#">اسم القسم</a></h4>
                    </div>
                    <a href="#">
                        <div class="thumb rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;"
                                    src="{{ asset('main_page/images/posts/inspiration-1.jpg') }}" alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>

                <!-- post -->
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="#">اسم القسم</a></h4>
                    </div>
                    <a href="#">
                        <div class="thumb rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;"
                                    src="{{ asset('main_page/images/posts/inspiration-1.jpg') }}" alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>

                <!-- post -->
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="#">اسم القسم</a></h4>
                    </div>
                    <a href="#">
                        <div class="thumb rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;"
                                    src="{{ asset('main_page/images/posts/inspiration-1.jpg') }}" alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>


                <!-- post -->
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="#">اسم القسم</a></h4>
                    </div>
                    <a href="#">
                        <div class="thumb rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;"
                                    src="{{ asset('main_page/images/posts/inspiration-1.jpg') }}" alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>


                <!-- post -->
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="#">اسم القسم</a></h4>
                    </div>
                    <a href="#">
                        <div class="thumb rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;"
                                    src="{{ asset('main_page/images/posts/inspiration-1.jpg') }}" alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="#">اسم القسم</a></h4>
                    </div>
                    <a href="#">
                        <div class="thumb rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;"
                                    src="{{ asset('main_page/images/posts/inspiration-1.jpg') }}" alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="#">اسم القسم</a></h4>
                    </div>
                    <a href="#">
                        <div class="thumb rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;"
                                    src="{{ asset('main_page/images/posts/inspiration-1.jpg') }}" alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="post post-over-content col-md-3 pt-3" style="text-align: center;">
                    <div class="details clearfix">
                        <h4 class="post-title"><a href="#">اسم القسم</a></h4>
                    </div>
                    <a href="#">
                        <div class="thumb rounded">
                            <div class="inner">
                                <img style="border-radius: 7px;"
                                    src="{{ asset('main_page/images/posts/inspiration-1.jpg') }}" alt="طبكم" />
                            </div>
                        </div>
                    </a>
                </div>



            </div>
        </div>
    </section>


    <section id="hero">

        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-12">

                    <!-- post tabs -->
                    <div class="post-tabs rounded bordered">
                        <!-- tab navs -->
                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation"><button aria-controls="popular"
                                    aria-selected="true" class="nav-link active" data-bs-target="#popular"
                                    data-bs-toggle="tab" id="popular-tab" role="tab" type="button">الأكثر
                                    مشاهدة</button>
                            </li>
                            <li class="nav-item" role="presentation"><button aria-controls="recent"
                                    aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab"
                                    id="recent-tab" role="tab" type="button">الأحدث</button></li>
                            <li class="nav-item" role="presentation"><button aria-controls="recent"
                                    aria-selected="false" class="nav-link" data-bs-target="#recent2"
                                    data-bs-toggle="tab" id="recent-tab2" role="tab" type="button">ما هو
                                    الجديد</button></li>
                        </ul>
                        <!-- tab contents -->
                        <div class="tab-content" id="postsTabContent">
                            <!-- loader -->
                            <div class="lds-dual-ring"></div>
                            <!-- popular posts -->
                            <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular"
                                role="tabpanel">
                                <div class="row">
                                    <?php
                                    $xx = 0;
                                    ?>
                                    @foreach ($posts as $singlepost)
                                        @if (1)
                                            @if ($xx <= 5)
                                                <div class="col-sm-4 pt-3">
                                                    <!-- post -->
                                                    <div class="post post-grid rounded bordered">
                                                        <div class="thumb top-rounded">
                                                            @foreach ($groups as $group)
                                                                @if ($group->id == $singlepost->TOPIC)
                                                                    <?php
                                                                    $string = $group->TAG;
                                                                    $str_arr = explode(',', $string);
                                                                    ?>

                                                                    @foreach ($tags as $singletag)
                                                                        @if (end($str_arr) == $singletag->id)
                                                                            <a href="/tags/{{ $singletag->id }}/show"
                                                                                class="category-badge position-absolute">{{ $singletag->TITLE }}</a>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach

                                                            <span class="post-format">
                                                                <i class="icon-picture"></i>
                                                            </span>
                                                            <a href="/posts/{{ $singlepost->id }}/show">
                                                                <div class="inner">
                                                                    <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                        alt="{{ $singlepost->TITLE }}" />
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="details">
                                                            <h5 class="post-title mb-3 mt-3"><a
                                                                    href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 60) }}</a>
                                                            </h5>
                                                            <p class="excerpt mb-0">
                                                                {{ Str::limit($singlepost->DESCRIPTION, 150) }}</p>
                                                        </div>
                                                        <div class="post-bottom clearfix d-flex align-items-center">
                                                            <div class="social-share me-auto">
                                                                <button class="toggle-button icon-share"></button>
                                                                <ul class="icons list-unstyled list-inline mb-0">
                                                                    <li class="list-inline-item"><a
                                                                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"><i
                                                                                class="fab fa-facebook-f"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode('طبكم: ' . $singlepost->TITLE) }}"><i
                                                                                class="fab fa-twitter"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($singlepost->TITLE) }}"><i
                                                                                class="fab fa-linkedin-in"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://pinterest.com/pin/create/button/?url={{ urlencode(Request::fullUrl()) }}&media={{ urlencode(asset('storage/' . $singlepost->IMG . '')) }}&description={{ urlencode($singlepost->TITLE) }}"><i
                                                                                class="fab fa-pinterest"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($singlepost->TITLE) }}"><i
                                                                                class="fab fa-telegram-plane"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="mailto:?subject={{ urlencode('طبكم: ' . $singlepost->TITLE) }}&body={{ urlencode(Request::fullUrl()) }}"><i
                                                                                class="far fa-envelope"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="more-button float-end">
                                                                <a href="/posts/{{ $singlepost->id }}/show"><span
                                                                        class="icon-options"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <?php
                                            $xx++;
                                            ?>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <!-- recent posts -->
                            <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                <div class="row">
                                    <?php
                                    $xx = 0;
                                    ?>
                                    @foreach ($posts as $singlepost)
                                        @if (1)
                                            @if ($xx <= 5)
                                                <div class="col-sm-4 pt-3">
                                                    <!-- post -->
                                                    <div class="post post-grid rounded bordered">
                                                        <div class="thumb top-rounded">
                                                            @foreach ($groups as $group)
                                                                @if ($group->id == $singlepost->TOPIC)
                                                                    <?php
                                                                    $string = $group->TAG;
                                                                    $str_arr = explode(',', $string);
                                                                    ?>

                                                                    @foreach ($tags as $singletag)
                                                                        @if (end($str_arr) == $singletag->id)
                                                                            <a href="/tags/{{ $singletag->id }}/show"
                                                                                class="category-badge position-absolute">{{ $singletag->TITLE }}</a>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach

                                                            <span class="post-format">
                                                                <i class="icon-picture"></i>
                                                            </span>
                                                            <a href="/posts/{{ $singlepost->id }}/show">
                                                                <div class="inner">
                                                                    <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                        alt="{{ $singlepost->TITLE }}" />
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="details">
                                                            <h5 class="post-title mb-3 mt-3"><a
                                                                    href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 60) }}</a>
                                                            </h5>
                                                            <p class="excerpt mb-0">
                                                                {{ Str::limit($singlepost->DESCRIPTION, 150) }}</p>
                                                        </div>
                                                        <div class="post-bottom clearfix d-flex align-items-center">
                                                            <div class="social-share me-auto">
                                                                <button class="toggle-button icon-share"></button>
                                                                <ul class="icons list-unstyled list-inline mb-0">
                                                                    <li class="list-inline-item"><a
                                                                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"><i
                                                                                class="fab fa-facebook-f"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode('طبكم: ' . $singlepost->TITLE) }}"><i
                                                                                class="fab fa-twitter"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($singlepost->TITLE) }}"><i
                                                                                class="fab fa-linkedin-in"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://pinterest.com/pin/create/button/?url={{ urlencode(Request::fullUrl()) }}&media={{ urlencode(asset('storage/' . $singlepost->IMG . '')) }}&description={{ urlencode($singlepost->TITLE) }}"><i
                                                                                class="fab fa-pinterest"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($singlepost->TITLE) }}"><i
                                                                                class="fab fa-telegram-plane"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="mailto:?subject={{ urlencode('طبكم: ' . $singlepost->TITLE) }}&body={{ urlencode(Request::fullUrl()) }}"><i
                                                                                class="far fa-envelope"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="more-button float-end">
                                                                <a href="/posts/{{ $singlepost->id }}/show"><span
                                                                        class="icon-options"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <?php
                                            $xx++;
                                            ?>
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <!-- recent posts -->
                            <div aria-labelledby="recent-tab2" class="tab-pane fade" id="recent2" role="tabpanel2">
                                <div class="row">
                                    <?php
                                    $xx = 0;
                                    ?>
                                    @foreach ($posts as $singlepost)
                                        @if (1)
                                            @if ($xx <= 5)
                                                <div class="col-sm-4 pt-3">
                                                    <!-- post -->
                                                    <div class="post post-grid rounded bordered">
                                                        <div class="thumb top-rounded">
                                                            @foreach ($groups as $group)
                                                                @if ($group->id == $singlepost->TOPIC)
                                                                    <?php
                                                                    $string = $group->TAG;
                                                                    $str_arr = explode(',', $string);
                                                                    ?>

                                                                    @foreach ($tags as $singletag)
                                                                        @if (end($str_arr) == $singletag->id)
                                                                            <a href="/tags/{{ $singletag->id }}/show"
                                                                                class="category-badge position-absolute">{{ $singletag->TITLE }}</a>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endforeach

                                                            <span class="post-format">
                                                                <i class="icon-picture"></i>
                                                            </span>
                                                            <a href="/posts/{{ $singlepost->id }}/show">
                                                                <div class="inner">
                                                                    <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                        alt="{{ $singlepost->TITLE }}" />
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="details">
                                                            <h5 class="post-title mb-3 mt-3"><a
                                                                    href="/posts/{{ $singlepost->id }}/show">{{ Str::limit($singlepost->TITLE, 60) }}</a>
                                                            </h5>
                                                            <p class="excerpt mb-0">
                                                                {{ Str::limit($singlepost->DESCRIPTION, 150) }}</p>
                                                        </div>
                                                        <div class="post-bottom clearfix d-flex align-items-center">
                                                            <div class="social-share me-auto">
                                                                <button class="toggle-button icon-share"></button>
                                                                <ul class="icons list-unstyled list-inline mb-0">
                                                                    <li class="list-inline-item"><a
                                                                            href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"><i
                                                                                class="fab fa-facebook-f"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode('طبكم: ' . $singlepost->TITLE) }}"><i
                                                                                class="fab fa-twitter"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($singlepost->TITLE) }}"><i
                                                                                class="fab fa-linkedin-in"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://pinterest.com/pin/create/button/?url={{ urlencode(Request::fullUrl()) }}&media={{ urlencode(asset('storage/' . $singlepost->IMG . '')) }}&description={{ urlencode($singlepost->TITLE) }}"><i
                                                                                class="fab fa-pinterest"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($singlepost->TITLE) }}"><i
                                                                                class="fab fa-telegram-plane"></i></a></li>
                                                                    <li class="list-inline-item"><a
                                                                            href="mailto:?subject={{ urlencode('طبكم: ' . $singlepost->TITLE) }}&body={{ urlencode(Request::fullUrl()) }}"><i
                                                                                class="far fa-envelope"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            <div class="more-button float-end">
                                                                <a href="/posts/{{ $singlepost->id }}/show"><span
                                                                        class="icon-options"></span></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            <?php
                                            $xx++;
                                            ?>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
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
                @foreach ($posts as $singlepost)
                    @if (1)
                        @if ($xx <= 7)
                            <!-- post -->
                            <div class="post featured-post-xl">
                                <div class="details clearfix">
                                    @foreach ($groups as $group)
                                        @if ($group->id == $singlepost->TOPIC)
                                            <?php
                                            $string = $group->TAG;
                                            $str_arr = explode(',', $string);
                                            ?>

                                            @foreach ($tags as $singletag)
                                                @if (end($str_arr) == $singletag->id)
                                                    <a href="/tags/{{ $singletag->id }}/show"
                                                        class="category-badge lg">{{ $singletag->TITLE }}</a>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach

                                    <h4 class="post-title"><a
                                            href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a></h4>
                                </div>
                                <a href="/posts/{{ $singlepost->id }}/show">
                                    <div class="thumb rounded">
                                        <div class="inner data-bg-image"
                                            data-bg-image="{{ asset('storage/' . $singlepost->IMG . '') }}"></div>
                                    </div>
                                </a>
                            </div>
                        @endif
                        <?php
                        $xx++;
                        ?>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    <section class="hero-carousel pt-5">
        <div dir="rtl" class="container-xl">
            <div class="row">
                <div class="section-header">
                    <h3 class="section-title">أحدث المقالات</h3>
                </div>

                <div class="padding-30 rounded bordered">
                    <div class="row gy-5">
                        <div class="col-sm-6">
                            <?php
                            $xx = 0;
                            ?>
                            @foreach ($posts as $singlepost)
                                @if (1)
                                    @if ($xx == 0)
                                        <div class="post">
                                            <div class="thumb rounded">
                                                @foreach ($groups as $group)
                                                    @if ($group->id == $singlepost->TOPIC)
                                                        <?php
                                                        $string = $group->TAG;
                                                        $str_arr = explode(',', $string);
                                                        ?>

                                                        @foreach ($tags as $singletag)
                                                            @if (end($str_arr) == $singletag->id)
                                                                <a href="/tags/{{ $singletag->id }}/show"
                                                                    class="category-badge position-absolute">{{ $singletag->TITLE }}</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <span class="post-format">
                                                    <i class="icon-picture"></i>
                                                </span>
                                                <a href="/videos/{{ $singlepost->id }}/show">
                                                    <div class="inner">
                                                        <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                            alt="{{ $singlepost->TITLE }}" />
                                                    </div>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-3 mt-3"><a
                                                    href="/videos/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                            </h5>
                                            <p class="excerpt mb-0">{{ $singlepost->DESCRIPTION }}</p>
                                        </div>
                                    @endif
                                    <?php
                                    $xx++;
                                    ?>
                                @endif
                            @endforeach
                        </div>
                        <div class="col-sm-6">
                            <?php
                            $xx = 0;
                            ?>
                            @foreach ($posts as $singlepost)
                                @if (1)
                                    @if ($xx <= 5 && $xx != 0)
                                        <div class="post post-list-sm square">
                                            <div class="thumb rounded">
                                                <a href="/videos/{{ $singlepost->id }}/show">
                                                    <div class="inner">
                                                        <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                            alt="{{ $singlepost->TITLE }}" />
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0"><a
                                                        href="/videos/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                                </h6>
                                            </div>
                                        </div>
                                    @endif
                                    <?php
                                    $xx++;
                                    ?>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="spacer" data-height="50"></div>
            </div>
        </div>
    </section>


@endsection
