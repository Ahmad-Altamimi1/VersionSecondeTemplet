@extends('layouts.welcome')

@section('content')
    <!-- Page Title -->



    <section style="text-align: right; padding-top: 250px;" class="section-wrap pt-40 pb-48">
        <div class="container">
            <div class="page-title__holder">

                <figure class="alignright">
                    <img src="{{ asset('storage/' . $post->IMG . '') }}" alt="">
                    <figcaption>{{ \Carbon\Carbon::parse($post->DATE)->format('Y/m/d H:i') }}</figcaption>
                </figure>

            </div>
            <div class="page-title__holder">
                <h1 class="page-title__title">{{ $post->TITLE }}</h1>

            </div>
        </div>
    </section>


    <!-- end page title -->

    <!-- Single Post -->
    <section class="section-wrap pt-40 pb-48">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="blog__content">
                        <article class="entry mb-0">
                            <div class="entry__article-wrap">


                                <div style="text-align: right;" class="entry__article">

                                    <?php echo $post->TEXT1; ?>

                                </div> <!-- end entry article -->
                            </div> <!-- end entry article wrap -->
                        </article>

                        <!-- Prev / Next Post -->
                        <nav class="entry-navigation">
                            <div class="row">

                                @if (isset($posts[$post->id - 1]->id))
                                    <div class="col-lg-6">
                                        <a href="/posts/{{ $posts[$post->id - 1]->id }}/show"
                                            class="entry-navigation__url entry-navigation--left">
                                            <img style="max-width: 50%;"
                                                src="{{ asset('storage/' . $posts[$post->id - 1]->IMG . '') }}"
                                                alt="" class="entry-navigation__img">
                                            <div class="entry-navigation__body">
                                                <i class="ui-arrow-left"></i>
                                                <span class="entry-navigation__label">المقال السابق</span>
                                                <h6 class="entry-navigation__title">{{ $posts[$post->id - 1]->TITLE }}</h6>
                                            </div>
                                        </a>
                                    </div>
                                @endif

                                @if (isset($posts[$post->id + 1]->id))
                                    <div class="col-lg-6">
                                        <a href="/posts/{{ $posts[$post->id + 1]->id }}/show"
                                            class="entry-navigation__url entry-navigation--right">
                                            <div class="entry-navigation__body">
                                                <span class="entry-navigation__label">المقال التالي</span>
                                                <i class="ui-arrow-right"></i>
                                                <h6 class="entry-navigation__title">{{ $posts[$post->id + 1]->TITLE }}</h6>
                                            </div>
                                            <img style="max-width: 50%;"
                                                src="{{ asset('storage/' . $posts[$post->id + 1]->IMG . '') }}"
                                                alt="" class="entry-navigation__img">
                                        </a>
                                    </div>
                                @endif

                            </div>
                        </nav>



                        <section style="text-align: right;" class="related-posts">
                            <h5 class="mb-24">آخر المقالات</h5>
                            <div class="row row-16 card-row">
                                <?php
                                $xx = 0;
                                ?>
                                @foreach ($posts as $singlepost)
                                    @if ($xx <= 5)
                                        <div class="col-lg-4">
                                            <article class="entry card card--small box-shadow hover-up">
                                                <div class="entry__img-holder card__img-holder">
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <img src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                            class="entry__img" alt="">
                                                    </a>
                                                    <div class="entry__body card__body">
                                                        <h4 class="entry__title">
                                                            <a
                                                                href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </article>
                                        </div>
                                    @endif
                                    <?php
                                    $xx++;
                                    ?>
                                @endforeach
                            </div>
                        </section>


                    </div>
                </div>
            </div>
        </div>
    </section> <!-- end single post -->
@endsection
