@extends('layouts.welcome')

@section('content')
    <section class="page-title text-center">
        <div class="container">
            <div class="page-title__holder">
                <h1 class="page-title__title">{{ $tag->TITLE }}</h1>
                <p class="page-title__subtitle">{{ $tag->DESCRIPTION }}</p>
            </div>
        </div>
    </section>

    <section class="section-wrap bottom-divider">
        <div class="container">
            <div class="row card-row">


                <?php
                $xx = 0;
                $large = 0;
                ?>
                @foreach ($tagposts as $singlepost)
                    @if ($xx <= 9)
                        <div class="col-lg-4">
                            <article class="entry card box-shadow hover-up">
                                <div class="entry__img-holder card__img-holder">
                                    <a href="/posts/{{ $singlepost->id }}/show">
                                        <img src="{{ asset('storage/' . $singlepost->IMG . '') }}" class="entry__img"
                                            alt="">
                                    </a>
                                    <div class="entry__date">
                                        <span
                                            class="entry__date-day">{{ \Carbon\Carbon::parse($singlepost->DATE_SCHEDULER)->format('d') }}</span>
                                        <span
                                            class="entry__date-month">{{ \Carbon\Carbon::parse($singlepost->DATE_SCHEDULER)->format('F') }}</span>
                                    </div>
                                    <div class="entry__body card__body">
                                        <h4 class="entry__title">
                                            <a href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                        </h4>
                                        <div class="entry__excerpt">
                                            <p><?php echo mb_substr($singlepost->DESCRIPTION, 0, 120); ?> ...</p>
                                        </div>
                                    </div>
                                </div>
                            </article>
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
            @if ($large)
                <nav class="pagination">
                    @if ($nm != 1)
                        <a href="/tags/6/show/<?php echo $nm - 1; ?>" class="pagination__page pagination__icon pagination__page--bre"><i
                                class="ui-arrow-left"></i></a>
                        <a href="/tags/6/show/<?php echo $nm - 1; ?>" class="pagination__page"><?php echo $nm - 1; ?></a>
                    @endif
                    <span class="pagination__page pagination__page--current"><?php echo $nm; ?></span>
                    <?php
                    $wordCount = $wordCount - 10;
                    ?>
                    @if ($wordCount > 0)
                        <a href="/tags/6/show/<?php echo $nm + 1; ?>" class="pagination__page"><?php echo $nm + 1; ?></a>
                    @endif
                    <?php
                    $wordCount = $wordCount - 10;
                    ?>
                    @if ($wordCount > 0)
                        <a href="/tags/6/show/<?php echo $nm + 2; ?>" class="pagination__page"><?php echo $nm + 2; ?></a>
                    @endif
                    <?php
                    $wordCount = $wordCount - 10;
                    ?>
                    @if ($wordCount > 0)
                        <a href="/tags/6/show/<?php echo $nm + 3; ?>" class="pagination__page"><?php echo $nm + 3; ?></a>
                    @endif
                    <a href="/tags/6/show/<?php echo $nm + 1; ?>" class="pagination__page pagination__icon pagination__page--next"><i
                            class="ui-arrow-right"></i></a>
                </nav>
            @endif


        </div>
    </section>
@endsection
