@extends('layouts.welcome')

@section('content')

<section class="page-header">
    <div class="container-xl">
        <div class="text-center">
            <h1 class="mt-0 mb-2">{{ $tag->TITLE }}</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="#">طبكم</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $tag->TITLE }}</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

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

                <div class="row gy-4">
                    <?php
                    $xx = 0;
                    $large = 0;
                    ?>
                    @foreach ($tagposts as $singlepost)
                        @if ($xx <= 9)

                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post post-grid rounded bordered">
                                <div class="thumb top-rounded">
                                    <a href="/tags/{{ $singlepost->TOPIC }}/show" class="category-badge position-absolute">@foreach ($tags as $tag)
                                        @if ($tag->id == $singlepost->TOPIC)
                                            {{ $tag->TITLE }}
                                        @endif
                                    @endforeach
                                
                                </a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="/posts/{{ $singlepost->id }}/show">
                                        <div class="inner">
                                            <img src="{{ asset('storage/' . $singlepost->IMG . '') }}" alt="{{ $singlepost->TITLE }}" />
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item">{{ \Carbon\Carbon::parse($singlepost->DATE)->format('F j, Y') }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a></h5>
                                    <p class="excerpt mb-0"><?php echo mb_substr($singlepost->DESCRIPTION, 0, 120); ?> ...</p>
                                </div>

                            </div>
                        </div>


                        @else
                            <?php
                            $large = 1;
                            ?>
                        @endif
                        <?php
                        $xx++;
                        ?>
                    @endforeach


                </div>

                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item active" aria-current="page">
                            <span class="page-link">1</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>

            </div>

        </div>

    </div>
</section>



@endsection
