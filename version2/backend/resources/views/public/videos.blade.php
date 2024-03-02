@extends('layouts.welcome')

@section('content')
    <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
        <div class="uk-container uk-container-center">
            <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}"
                data-uk-grid-margin="">

                <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                        <?php $pic = 'main_page/images/2022/' . rand(1, 6) . '.jpg'; ?>
                        <div class="uk-cover-background uk-position-relative head-wrap"
                            style="height: 290px; background-image: url('{{ asset($pic) }}');">
                            <img class="uk-invisible" src="{{ asset($pic) }}" alt="" height="290"
                                width="1920">
                            <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                {{-- <h1>{{ $post->TITLE }}</h1> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="uk-container uk-container-center alt">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
            <li><a href="/videos/show">
                    الفيديوهات
                </a></li>
        </ul>
    </div>



    <div class="uk-container uk-container-center">
        <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
            <div class="tm-main uk-width-medium-3-4 uk-push-1-4">

                <div class="contentpaneopen">
                    <main id="tm-content" class="tm-content">
                        <div class="uk-grid" data-uk-grid-match="">
                            <?php
                            $xx = 0;
                            ?>
                            @foreach ($videos as $singlevideo)
                                @if (1)
                                    @if ($xx <= 20)
                                        <div
                                            class="uk-width-large-1-3 uk-width-medium-2-4 uk-width-small-2-4 list-article other uk-flex uk-flex-column">
                                            <div class="wrapper">
                                                <div class="img-wrap">
                                                    <a href="/videos/{{ $singlevideo->id }}/show">
                                                        <img src="{{ asset('storage/' . $singlevideo->IMG . '') }}"
                                                            class="img-polaroid" alt="{{ $singlevideo->TITLE }}">
                                                    </a>
                                                </div>
                                                <div class="info">
                                                    <div class="date">
                                                        {{ \Carbon\Carbon::parse($singlevideo->DATE)->format('Y/m/d H:i') }}
                                                    </div>
                                                    <div class="name">
                                                        <h4>
                                                            <a href="/videos/{{ $singlevideo->id }}/show">
                                                                {{ $singlevideo->TITLE }} </a>
                                                        </h4>
                                                        <p class="card-text"><?php echo mb_substr($singlevideo->DESCRIPTION, 0, 300); ?> ...</p>
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
                        {{-- <form method="post">
                            <div class="pagination">
                                <ul class="pagination-list">
                                    <li class="pagination-start"><span class="pagenav">Start</span></li>
                                    <li class="pagination-prev"><span class="pagenav">Prev</span></li>
                                    <li><span class="pagenav">1</span></li>
                                    <li><a href="#" class="pagenav">2</a></li>
                                    <li class="pagination-next"><a data-original-title="Next" title="" href="#"
                                            class="hasTooltip pagenav">Next</a></li>
                                    <li class="pagination-end"><a data-original-title="End" title="" href="#"
                                            class="hasTooltip pagenav">End</a></li>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </form> --}}
                    </main>
                </div>


            </div>
            <aside class="tm-sidebar-a uk-width-medium-1-4 uk-pull-3-4 uk-row-first pt-5">
                <div style="direction: rtl ;" class="uk-panel news-sidebar">
                    <h3 class="uk-panel-title">الأكثر مشاهدة</h3>


                    <?php
                    $xx = 0;
                    ?>
                    @foreach ($mostposts as $singlepost)
                        @if ($xx <= 5)
                            <article class="has-context ">
                                <div class="latest-news-wrap">
                                    <div class="img-wrap">
                                        <a href="/posts/{{ $singlepost->id }}/show">
                                            <img src="{{ asset('storage/' . $singlepost->IMG . '') }}" class="img-polaroid"
                                                alt="{{ $singlepost->TITLE }}">
                                        </a>
                                    </div>
                                    <div class="info">
                                        <div class="date">
                                            {{ \Carbon\Carbon::parse($singlepost->DATE)->format('Y/m/d H:i') }}
                                        </div>
                                        <div class="name">
                                            <h4>
                                                <a href="/posts/{{ $singlepost->id }}/show">
                                                    {{ $singlepost->TITLE }} </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endif
                        <?php
                        $xx++;
                        ?>
                    @endforeach

                </div>
                <div style="direction: rtl ;" class="uk-panel tags-sidebar pt-4">
                    <h3 class="uk-panel-title">تصنيفات</h3>
                    <div class="contentpaneopen">
                        <ul id="tag-list-mod-tagcloud" class="tag_list">
                            <li class="tag_element" id="tag-0"><a href="/tags/2/show" rel="nofollow"><span
                                        class="tag">أخبار</span></a></li>
                            <li class="tag_element" id="tag-1"><a href="/tags/1/show" rel="nofollow"><span
                                        class="tag">المقالات</span></a></li>
                            <li class="tag_element" id="tag-6"><a href="/tags/4/show" rel="nofollow"><span
                                        class="tag"> كأس العالم 2022 </span></a></li>
                            <li class="tag_element" id="tag-7"><a href="/tags/3/show" rel="nofollow"><span
                                        class="tag">تحليلات
                                        رياضية</span></a></li>
                        </ul>
                    </div>
                    <div style="clear: both;"></div>
                </div>




            </aside>
        </div>
    </div>
@endsection
