@extends('layouts.welcome')

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">

                <div style="text-align: right; direction: rtl;"
                    class="d-flex justify-content-between align-items-center pt-5">
                    <ol>
                        <li><a href="{{ url('/') }}">الصفحة الرئيسة</a></li>
                        <li><a href="/tags/{{ $post->TOPIC }}/show">
                                @foreach ($tags as $singletag)
                                    @if ($post->TOPIC == $singletag->id)
                                        {{ $singletag->TITLE }}
                                    @endif
                                @endforeach
                            </a></li>
                        <li>{{ $post->TITLE }}</li>
                    </ol>
                </div>

            </div>
        </div><!-- End Breadcrumbs -->

        <?php
        $string = $post->TAG;
        $str_arr = explode(',', $string);
        ?>

        <!-- ======= Blog Details Section ======= -->
        <section id="blog" class="blog">
            <div style="text-align: right;" class="container" data-aos="fade-up">

                <div style="direction: rtl;" class="row g-5">

                    <div class="col-lg-8">

                        <article class="blog-details">

                            <div style="display: block; margin-left: auto; margin-right: auto;" class="post-img">
                                <img src="{{ asset('storage/' . $post->IMG . '') }}" alt="" class="img-fluid">
                            </div>

                            <h2 class="title">{{ $post->TITLE }}</h2>

                            <div style="text-align: right; direction: rtl;" class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="bi bi-clock pl-2"> </i><time>
                                            {{ \Carbon\Carbon::parse($post->DATE)->format('Y/m/d H:i') }}</time></li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content">
                                <?php echo $post->TEXT1; ?>

                            </div><!-- End post content -->

                            <div class="meta-bottom">
                                <i class="bi bi-folder"></i>
                                <ul class="cats">
                                    <li><a href="#">
                                            @foreach ($tags as $singletag)
                                                @if ($post->TOPIC == $singletag->id)
                                    <li><a href="/tags/{{ $singletag->id }}/show">{{ $singletag->TITLE }}</a></li>
                                    @endif
                                    @endforeach

                                    </a></li>
                                </ul>
                                <i class="bi bi-tags"></i>
                                <ul class="tags">
                                    @foreach ($str_arr as $stag)
                                        @foreach ($tags as $singletag)
                                            @if ($stag == $singletag->id)
                                                <li><a href="/tags/{{ $singletag->id }}/show">{{ $singletag->TITLE }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div><!-- End meta bottom -->

                        </article><!-- End blog post -->

                    </div>


                    <div class="col-lg-4">

                        <div class="sidebar">



                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">آخر المقالات</h3>

                                <div class="mt-3">
                                    <?php
                                    $xx = 0;
                                    ?>
                                    @foreach ($posts as $singlepost)
                                        @if ($xx <= 10)
                                            <div class="post-item mt-3">
                                                <img src="{{ asset('storage/' . $singlepost->IMG . '') }}" alt=""
                                                    class="flex-shrink-0">
                                                <div>
                                                    <h4><a
                                                            href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                                    </h4>
                                                    <time>{{ \Carbon\Carbon::parse($singlepost->DATE)->format('d/m/Y') }}</time>
                                                </div>
                                            </div><!-- End recent post item-->
                                        @endif
                                        <?php
                                        $xx++;
                                        ?>
                                    @endforeach




                                </div>

                            </div><!-- End sidebar recent posts-->

                            <div class="sidebar-item tags">
                                <h3 class="sidebar-title">التصنيفات</h3>
                                <ul class="mt-3">
                                    
                                    @foreach ($str_arr as $stag)
                                        @foreach ($tags as $singletag)
                                            @if ($stag == $singletag->id)
                                                <li><a href="/tags/{{ $singletag->id }}/show">{{ $singletag->TITLE }}</a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div><!-- End sidebar tags-->

                            <div class="sidebar-item search-form">
                                <h3 class="sidebar-title">البحث</h3>
                                <form action="" class="mt-3">
                                    <input style="text-align: center" type="text">
                                    <button type="submit"><i class="bi bi-search"></i></button>
                                </form>
                            </div><!-- End sidebar search formn-->


                        </div><!-- End Blog Sidebar -->

                    </div>

                </div>

            </div>
        </section><!-- End Blog Details Section -->

    </main><!-- End #main -->
@endsection
