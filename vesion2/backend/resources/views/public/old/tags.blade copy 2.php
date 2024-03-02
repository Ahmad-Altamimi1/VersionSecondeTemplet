@extends('layouts.welcome')

@section('content')
<section style="text-align: right;" class="main-content">
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

                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">سؤال وجواب طبي</h3>
                        </div>
                        <div class="widget-content">
                            <?php
                            $xx = 0;
                            ?>
                            @foreach ($posts as $singlepost)
                                @if ($singlepost->TOPIC == '4')
                                    @if ($xx <= 4)
                                        <!-- post -->
                                        <div class="post post-list-sm square">
                                            <div class="thumb circle">
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
                                                        {{ \Carbon\Carbon::parse($singlepost->DATE)->format('F j, Y') }}
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

                    <!-- widget categories -->
                    <div class="widget rounded">
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

                    </div>


                    <!-- widget post carousel -->
                    <div class="widget rounded">
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
                                                    {{ \Carbon\Carbon::parse($singlepost->DATE)->format('F j, Y') }}
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

                    <!-- widget advertisement -->
                    <div class="widget no-container rounded text-md-center">
                        <span class="ads-title">- اعلان ممول -</span>
                        <a href="#" class="widget-ads">
                            <img src="{{ asset('main_page/images/ads/ad-360.png') }}" alt="Advertisement" />
                        </a>
                    </div>

                    <!-- widget tags -->
                    <div class="widget rounded">
                        <div class="widget-header text-center">
                            <h3 class="widget-title">آخر التصنيفات</h3>
                        </div>
                        <div class="widget-content">
                            <?php
                                $xx = 0;
                                ?>
                                @foreach ($tags as $mosttag)
                                    @if ($xx <= 6)
                                    <a href="/tags/{{ $mosttag->id }}/show" class="tag">#{{ $mosttag->TITLE }}</a>
                                    @endif
                                    <?php
                                    $xx++;
                                    ?>
                                @endforeach
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-lg-8">

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
                                                {{ \Carbon\Carbon::parse($posts[$i]->DATE)->format('F j, Y') }}</li>
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
                                        {{ \Carbon\Carbon::parse($posts[0]->DATE)->format('F j, Y') }}</li>
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

                <div class="spacer" data-height="50"></div>

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
                                                    {{ \Carbon\Carbon::parse($singlepost->DATE)->format('F j, Y') }}
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
                                                        {{ \Carbon\Carbon::parse($singlepost->DATE)->format('F j, Y') }}
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
                                                    {{ \Carbon\Carbon::parse($singlepost->DATE)->format('F j, Y') }}
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
                                                        {{ \Carbon\Carbon::parse($singlepost->DATE)->format('F j, Y') }}
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
                                                {{ \Carbon\Carbon::parse($singlepost->DATE)->format('F j, Y') }}</li>
                                        </ul>
                                    </div>
                                    <a href="/posts/{{ $singlepost->id }}/show">
                                        <div class="thumb rounded">
                                            <div class="inner">
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
                                                <a href="/posts/{{ $singlepost->id }}/sho">
                                                    <div class="inner">
                                                        <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                            alt="{{ $singlepost->TITLE }}" />
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details">
                                                <ul class="meta list-inline mb-3">
                                                    <li class="list-inline-item">
                                                        {{ \Carbon\Carbon::parse($singlepost->DATE)->format('F j, Y') }}
                                                    </li>
                                                </ul>
                                                <h5 class="post-title"><a href="/posts/{{ $singlepost->id }}/sho">The
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


                </div>

            </div>


        </div>

    </div>
</section>

@endsection
