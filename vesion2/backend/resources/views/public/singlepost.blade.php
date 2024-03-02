@extends('layouts.welcome')
<style>
    .post.post-list-sm:after{
        display: none !important;
    }
    .post .thumb img{
        aspect-ratio: 6/4;
    }
</style>
@section('content')
    <section dir="rtl" class="main-content mt-3">
        <div class="container-xl">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @foreach ($groups as $group)
                        @if ($group->id == $post->TOPIC)
                            <?php
                            $string = $group->TAG;
                            $str_arr = explode(',', $string);
                            ?>
                            @foreach ($str_arr as $stag)
                                @foreach ($tags as $singletag)
                                    @if ($stag == $singletag->id)
                                        <li class="breadcrumb-item"><a
                                                href="/tags/{{ $singletag->id }}/show">{{ $singletag->TITLE }}</a></li>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    @endforeach
                    <li class="breadcrumb-item active" aria-current="page">{{ $post->TITLE }}</li>
                </ol>
            </nav>

            <div class="row gy-4">

                <div class="col-lg-8">
                    <!-- post single -->
                    <div class="post post-single">
                        <!-- post header -->
                        <div class="post-header">
                            <h1 class="title mt-0 mb-3">{{ $post->TITLE }}</h1>
                        </div>
                        <!-- featured image -->
                        <div class="featured-image">
                            <img style="width: 100%;" src="{{ asset('storage/' . $post->IMG . '') }}"
                                alt="{{ $post->PIC_Name }}" />
                            <div class="bottom-right">
                                <p>{{ $post->PIC_Name }}</p>
                            </div>

                        </div>
                        <!-- post content -->
                        <div class="post-content clearfix">
                            <?php echo $post->TEXT1; ?>
                        </div>

                        @if ($post->REFERENCES)
                            <ul class="faq-list Tright">
                                <li>
                                    <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">
                                        <p class="category-badge lg">المراجع</p>
                                    </div>
                                    <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                                        <?php echo $post->REFERENCES; ?>

                                    </div>
                                </li>
                            </ul>
                        @endif


                        <!-- post bottom section -->
                        <div class="post-bottom">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6 col-12 text-center text-md-start">
                                    <!-- tags -->
                                    @foreach ($groups as $group)
                                        @if ($group->id == $post->TOPIC)
                                            <?php
                                            $string = $group->TAG;
                                            $str_arr = explode(',', $string);
                                            ?>
                                            @foreach ($str_arr as $stag)
                                                @foreach ($tags as $singletag)
                                                    @if ($stag == $singletag->id)
                                                        <a href="/tags/{{ $singletag->id }}/show"
                                                            class="tag">#{{ $singletag->TITLE }}</a>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        @endif
                                    @endforeach
                                </div>
                                <div class="col-md-6 col-12">
                                    <p>شارك عبر السوشيال ميديا</p>
                                    <!-- social icons -->
                                    <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                                        <li class="list-inline-item">
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}"
                                                target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode('طبكم: ' . $post->TITLE) }}"
                                                target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::fullUrl()) }}&title={{ urlencode($post->TITLE) }}"
                                                target="_blank">
                                                <i class="fab fa-linkedin-in"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://pinterest.com/pin/create/button/?url={{ urlencode(Request::fullUrl()) }}&media={{ urlencode(asset('storage/' . $post->IMG . '')) }}&description={{ urlencode($post->TITLE) }}"
                                                target="_blank">
                                                <i class="fab fa-pinterest"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="https://t.me/share/url?url={{ urlencode(Request::fullUrl()) }}&text={{ urlencode($post->TITLE) }}"
                                                target="_blank">
                                                <i class="fab fa-telegram-plane"></i>
                                            </a>
                                        </li>
                                        <li style="padding-right: 16px;" class="list-inline-item">
                                            <a
                                                href="mailto:?subject={{ urlencode('طبكم: ' . $post->TITLE) }}&body={{ urlencode(Request::fullUrl()) }}">
                                                <i class="far fa-envelope"></i>
                                            </a>
                                        </li>
                                    </ul>

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


                </div>

                <div class="col-lg-4">


                    <!-- sidebar -->
                    <div class="sidebar">
                        <div style="direction: ltr" class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">شاهد المستخدمون أيضاً</h3>
                            </div>
                            <div class="widget-content">
                                <div style="text-align: right;" class="post-carousel-widget">
                                    <?php
                                    $xx = 0;
                                    ?>
                                    @foreach ($posts as $singlepost)
                                        @if ($singlepost->TOPIC == $post->TOPIC)
                                            @if ($xx <= 4)
                                                <!-- post -->
                                                <div class="post post-carousel">
                                                    <div class="thumb rounded">
                                                        <a href="/tags/{{ $singlepost->TOPIC }}/show"
                                                            class="category-badge position-absolute">
                                                            {{-- @foreach ($tags as $tag)
                                                                @if ($tag->id == $singlepost->TOPIC) --}}
                                                                    {{ $singlepost->tag->TITLE }}
                                                                {{-- @endif
                                                            @endforeach --}}
                                                        </a>
                                                        <a href="/posts/{{ $singlepost->id }}/show">
                                                            <div class="inner">
                                                                <img style="height: 300px; width: auto; margin: auto;"
                                                                    src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                    alt="{{ $singlepost->TITLE }}" />
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <h5 class="post-title mb-0 mt-4"><a
                                                            href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                                    </h5>
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


                        <!-- widget popular posts -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">آخر المقالات</h3>
                            </div>
                            <div class="widget-content" style="display: flex;
                            flex-direction: column;
                            gap: 35px;">
                                <?php
                                $xx = 0;
                                ?>
                                @foreach ($posts as $singlepost)
                                    @if (1)
                                        @if ($xx <= 5)
                                            <!-- post -->
                                            <div class="post post-list-sm circle" style="    display: flex;

                                            flex-direction: row-reverse;
                                        }">
                                                <div style="max-width: 85px;" class="thumb">
                                                    <a href="/posts/{{ $singlepost->id }}/show">
                                                        <div class="inner">
                                                            <img style="border-radius: 2px;"
                                                                src="{{ asset('storage/' . $singlepost->IMG . '') }}"
                                                                alt="{{ $post->PIC_Name }}" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="details clearfix" style="    margin-left: 20px;    flex: 1;">
                                                    <h6 class="post-title my-0"><a
                                                            href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
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

                        </div>

                        <!-- widget newsletter -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Newsletter</h3>
                                <img src="images/wave.svg" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                                <form>
                                    <div class="mb-2">
                                        <input class="form-control w-100 text-center" placeholder="Email address…"
                                            type="email">
                                    </div>
                                    <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                                </form>
                                <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a
                                        href="#">Privacy Policy</a></span>
                            </div>
                        </div>

                        <!-- widget post carousel -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Celebration</h3>
                                <img src="images/wave.svg" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <div class="post-carousel-widget">
                                    <!-- post -->
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="category.html" class="category-badge position-absolute">How to</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can
                                                Turn Future Into Success</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="category.html" class="category-badge position-absolute">Trending</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/widgets/widget-carousel-2.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">Master The Art Of
                                                Nature With These 7 Tips</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="category.html" class="category-badge position-absolute">How to</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can
                                                Turn Future Into Success</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
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
                            <span class="ads-title">- Sponsored Ad -</span>
                            <a href="#" class="widget-ads">
                                <img src="images/ads/ad-360.png" alt="Advertisement" />
                            </a>
                        </div>

                        <!-- widget tags -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Tag Clouds</h3>
                                <img src="images/wave.svg" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <a href="#" class="tag">#Trending</a>
                                <a href="#" class="tag">#Video</a>
                                <a href="#" class="tag">#Featured</a>
                                <a href="#" class="tag">#Gallery</a>
                                <a href="#" class="tag">#Celebrities</a>
                            </div>
                        </div> --}}

                    </div>

                </div>

            </div>

        </div>
    </section>
    <script>
            document.addEventListener('DOMContentLoaded', function() {

document.querySelector(".preloader").style.display = "none";
    var searchInput = document.getElementById('searchInput');
    var searchResults = document.getElementById('searchResults');

    console.log("input11");
    searchInput.addEventListener('input', function() {
        console.log("input");
        var query = searchInput.value;
var searchResultItems = document.querySelectorAll('#searchResults');

        searchResultItems.forEach(function (searchResultItem) {
    searchResultItem.style.display = "block";
});
        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/search', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var results = JSON.parse(xhr.responseText);
                displayResults(results);
            }
        };
        xhr.send('query=' + encodeURIComponent(query));

    if (searchInput.value=="") {
        searchResults.style.height=0;
    }

function displayResults(results) {
searchResults.innerHTML = '';
    if (results.length > 0) {
    var containerHeight = results.length > 0 ? results.length * 70 : 100;
    searchResults.style.height = containerHeight + 'px';

    results.forEach(function(result, index) {
    var searchResultsul = document.querySelector('#searchResults');

    searchResultsul.style.display = 'flex';
    searchResultsul.style.flexDirection = 'column';

    var li = document.createElement('li');
    li.style.listStyle = "none";

    li.innerHTML = `<a style="color:white;" href="posts/${result.id}/show">
--${result.TITLE}</a>`;
    searchResults.appendChild(li);
});

    } else {
        var li = document.createElement('li');
    li.style.listStyle = "none";

        li.textContent = 'لا يوجد نتائج ';

        searchResults.style.height = '50px';

        searchResults.appendChild(li);
    }

}
});
});
// document.addEventListener('click', function () {
//     var searchResultItems = document.querySelectorAll('#searchResults');
// console.log('searchResultItems',searchResultItems);
//     searchResultItems.forEach(function (searchResultItem) {
//         searchResultItem.style.display = "none";
//     });
// });

    </script>
@endsection
