@extends('layouts.welcome')
<style>
    .other {
        flex-wrap: nowrap !important;

    }

    @media (max-width:767px) {
        .other {
            flex-wrap: wrap;

        }
    }
</style>
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.7.7/css/uikit.min.css" integrity="sha512-...">
    <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
        <div class="uk-container uk-container-center">
            <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}"
                data-uk-grid-margin="">

                {{-- <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                        <?php $pic = 'main_page/images/logo.png';
                        ?>
                        <div class="uk-cover-background uk-position-relative head-wrap"
                            style="height: 290px; background-image: url('{{ asset($pic) }}');">
            <img class="uk-invisible" src="{{ asset($pic) }}" alt="" height="290" width="1920">
            <div class="uk-position-cover uk-flex uk-flex-center head-title">
                <h1>{{ $post->TITLE }}</h1>
            </div>
    </div>
</div>
</div>
</section>
</div>
</div> --}}

                <!-- Start Blog
                                    ============================================= -->



                <div class="uk-container uk-container-center alt">
                    <ul class="uk-breadcrumb">
                        <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
                        <li><a href="/videos/show">
                                الفيديوهات
                            </a></li>
                        <li class="uk-active"><span>{{ $video->TITLE }}</span></li>
                    </ul>
                </div>

                <div class="uk-container uk-container-center">
                    <div id="tm-middle" class="tm-middle uk-grid" data-uk-grid-match="" data-uk-grid-margin="">
                        <div class="tm-main uk-width-medium-3-4 uk-push-1-4">
                            <main id="tm-content" class="tm-content">
                                <div class="contentpaneopen">
                                    <article>
                                        <div class="clearfix"></div>
                                        <div class="article-slider"
                                            style="    border-radius: 18px;
                            overflow: hidden;">
                                            <div id="carusel-11-30" class="uk-slidenav-position"
                                                data-uk-slideshow="{ height : 510 }">
                                                <iframe width="100%" height="500px"
                                                    src="https://www.youtube.com/embed/{{ $video->VID }}">
                                                </iframe>

                                            </div>
                                        </div>
                                        <div class="article-param">
                                            <div class="date">
                                                {{ \Carbon\Carbon::parse($video->DATE)->format('Y/m/d H:i') }}
                                                <i class="uk-icon-calendar"></i>
                                            </div>
                                        </div>
                                        <div class="article-single-text" style="
                        }">
                                            <?php echo $video->TEXT1; ?>
                                        </div>
                                        <div class="share-wrap">
                                            <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
                                            <div class="yashare-auto-init" data-yasharel10n="en" data-yasharetype="none"
                                                data-yasharequickservices="facebook,twitter,gplus"><span class="b-share"><a
                                                        rel="nofollow" target="_blank" title="Facebook"
                                                        class="b-share__handle b-share__link b-share-btn__facebook"
                                                        href="https://share.yandex.net/go.xml?service=facebook&amp;url={{ url('/videos/' . $video->id . '/show') }}"
                                                        data-service="facebook"><span
                                                            class="b-share-icon b-share-icon_facebook"></span></a><a
                                                        rel="nofollow" target="_blank" title="Twitter"
                                                        class="b-share__handle b-share__link b-share-btn__twitter"
                                                        href="https://share.yandex.net/go.xml?service=twitter&amp;url={{ url('/videos/' . $video->id . '/show') }}"
                                                        data-service="twitter"><span
                                                            class="b-share-icon b-share-icon_twitter"></span></a><a
                                                        rel="nofollow" target="_blank" title="Google Plus"
                                                        class="b-share__handle b-share__link b-share-btn__gplus"
                                                        href="https://share.yandex.net/go.xml?service=gplus&amp;url={{ url('/videos/' . $video->id . '/show') }}"
                                                        data-service="gplus"><span
                                                            class="b-share-icon b-share-icon_gplus"></span></a></span></div>
                                            <div class="share-title">شارك</div>
                                        </div>
                                    </article>

                                    <div class="news-nav-wrap">
                                        <div class="uk-grid" data-uk-grid-match="">

                                        </div>
                                    </div>


                                    <h3 class="other-post-title">
                                        @foreach ($tags as $singletag)
                                            @if ($video->TOPIC == $singletag->id)
                                                {{ $singletag->TITLE }}
                                            @endif
                                        @endforeach
                                        <span>أخرى</span>
                                    </h3>
                                    <div class="uk-grid other" data-uk-grid-match=" ">
                                        <?php
                                        $xx = 0;
                                        ?>
                                        @foreach ($videos as $singlevideo)
                                            @if (1)
                                                @if ($xx <= 2)
                                                    <div
                                                        class="uk-width-large-1-3 uk-width-medium-2-4 uk-width-small-2-4 list-article other uk-flex uk-flex-column">
                                                        <div class="wrapper">
                                                            <div class="img-wrap">
                                                                <a
                                                                    href="{{ url('/videos/' . $singlevideo->id . '/show') }}">
                                                                    <img src="{{ asset('storage/' . $singlevideo->IMG . '') }}"
                                                                        class="img-polaroid" alt="">
                                                                </a>
                                                            </div>
                                                            <div class="info">
                                                                <div class="date">
                                                                    {{ \Carbon\Carbon::parse($singlevideo->DATE)->format('Y/m/d H:i') }}
                                                                </div>
                                                                <div class="name">
                                                                    <h4>
                                                                        <a
                                                                            href="{{ url('/videos/' . $singlevideo->id . '/show') }}">
                                                                            {{ $singlevideo->TITLE }} </a>
                                                                    </h4>
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

                            </main>
                        </div>
                        <aside class="tm-sidebar-a uk-width-medium-1-4 uk-pull-3-4 uk-row-first pt-5">
                            <h3 class="uk-panel-title">الأكثر مشاهدة</h3>
                            <div style="direction: rtl ;" class="uk-panel news-sidebar"
                                style="display:flex; flex-wrap: wrap">


                                <?php
                                $xx = 0;
                                ?>
                                @foreach ($mostvideos as $singlevideo)
                                    @if ($xx <= 5)
                                        <article class="has-context col-lg-4 col-md-4 col-sm-12">
                                            <div class="latest-news-wrap">
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
                                        @foreach ($VideosTopics as $topic)
                                        @endforeach
                                        <li class="tag_element" id="tag-0"><a href="/tags/2/show"
                                                rel="nofollow"><span class="tag">أخبار</span></a></li>
                                        <li class="tag_element" id="tag-1"><a href="/tags/1/show"
                                                rel="nofollow"><span class="tag">المقالات</span></a></li>
                                        <li class="tag_element" id="tag-6"><a href="/tags/4/show"
                                                rel="nofollow"><span class="tag"> كأس
                                                    العالم 2022 </span></a></li>
                                        <li class="tag_element" id="tag-7"><a href="/tags/3/show"
                                                rel="nofollow"><span class="tag">تحليلات
                                                    رياضية</span></a></li>
                                    </ul>
                                </div>
                                <div style="clear: both;"></div>
                            </div>




                        </aside>
                    </div>
                </div>
                <!-- End Blog -->
            @endsection
