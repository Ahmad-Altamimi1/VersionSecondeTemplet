<!DOCTYPE html>
<html lang="en-gb">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="author" content="Nayef Yahya : nayefyahya98@gmail.com">

    <title>{{ $page['tital'] }}</title>
    <meta name="title" content="{{ $page['tital'] }}">
    <meta name="description" content="{{ $page['description'] }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ $page['url'] }}">
    <meta property="og:title" content="{{ $page['tital'] }}">
    <meta property="og:description" content="{{ $page['description'] }}">
    <meta property="og:image" content="{{ $page['imgurl'] }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ $page['url'] }}">
    <meta property="twitter:title" content="{{ $page['tital'] }}">
    <meta property="twitter:description" content="{{ $page['description'] }}">
    <meta property="twitter:image" content="{{ $page['imgurl'] }}">





    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css" />
    <link href="{{ asset('img/ll.png') }}" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <link href="{{ asset('main_page/css/akslider.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main_page/css/donate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('main_page/css/theme.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/mootools/1.3.1/mootools-yui-compressed.js">
    </script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet" />
    <style>
        .image-parent {
            max-width: 40px;
        }
    </style>
</head>

<body class="tm-isblog">
    <div class="over-wrap">
        <div class="toolbar-wrap">
            <div class="uk-container uk-container-center">
                <div class="tm-toolbar uk-clearfix uk-hidden-small">
                    <div class="uk-float-left">
                        <div class="uk-panel">
                            <div class="social-top">
                                <a href="https://www.facebook.com/sufara22"><span class="uk-icon-small uk-icon-hover uk-icon-facebook"></span></a>
                                <a href="https://twitter.com/sufara"><span class="uk-icon-small uk-icon-hover uk-icon-twitter fa fa-telegram"></span></a>
                                <a href="https://www.youtube.com/@sufara"><span class="uk-icon-small uk-icon-hover uk-icon-youtube"></span></a>
                                <a href="https://t.me/sufara"><span
                                        class="uk-icon-small uk-icon-hover uk-icon-telegram"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tm-menu-box">
            <div style="height: 70px" class="uk-sticky-placeholder">
                
                <nav style="margin: 0px" class="tm-navbar uk-navbar" data-uk-sticky="">
                    <div class="uk-container uk-container-center">

                        <a class="tm-logo uk-float-right" href="{{ url('/') }}">
                        <span>طبكم - tebkum <em>سبورت </em></span><img style="max-height:50px ;" src="{{ url('/img/logo_sport_wite.png') }}" alt="logo" title="logo">

                        </a>

                        <ul class="uk-navbar-nav uk-hidden-small">
                            <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
                            <li><a href="/tags/2/show">أخبار</a></li>
                            <li><a href="/tags/1/show">المقالات</a></li>
                            <li><a href="{{ url('/videos/show') }}">TV طبكم - tebkum</a></li>
                            <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true"
                                aria-expanded="false">
                                <a href="#">كرة القدم</a>
                                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                                    <div class="uk-grid uk-dropdown-grid">
                                        <div class="uk-width-1-1">
                                            <ul class="uk-nav uk-nav-navbar">
                                                <li><a href="/tags/4/show">كأس العالم 2022</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="uk-parent" data-uk-dropdown="{'preventflip':'y'}" aria-haspopup="true"
                                aria-expanded="false">
                                <a href="#">المزيد</a>
                                <div class="uk-dropdown uk-dropdown-navbar uk-dropdown-width-1">
                                    <div class="uk-grid uk-dropdown-grid">
                                        <div class="uk-width-1-1">
                                            <ul class="uk-nav uk-nav-navbar">
                                                <li><a href="{{ url('/aboutus') }}">من نحن</a></li>
                                                <li><a href="{{ url('/policy') }}">سياسة الخصوصية</a></li>
                                                <li><a href="{{ url('/contactus') }}">تواصل معنا</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @if (Route::has('login'))
                                @auth

                                    @if (Auth::user()->admin == '1')
                                        <li><a href="{{ url('/dashboard') }}">لوحة التحكم</a>
                                        </li>
                                    @endif

                                    <li> <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            تسجيل الخروج
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endauth

                            @endif
                        </ul>
                        <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
                    </div>
                </nav>
            </div>
        </div>






        @yield('content')






        <div class="bottom-wrapper">
            <div class="tm-bottom-f-box">
                <div class="uk-container uk-container-center">
                    <section id="tm-bottom-f" class="tm-bottom-f uk-grid"
                        data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                        <div class="uk-width-1-1">
                            <div class="uk-panel">
                                <div class="footer-logo">
                                    <a href="/">طبكم - tebkum</a>
                                </div>
                                <div class="footer-socials">
                                    <div class="social-top">
                                        <a href="https://www.facebook.com/sufara22"><span class="uk-icon-small uk-icon-hover uk-icon-facebook"></span></a>
                                        <a href="https://twitter.com/sufara"><span class="uk-icon-small uk-icon-hover uk-icon-twitter fa fa-telegram"></span></a>
                                        <a href="https://www.youtube.com/@sufara"><span class="uk-icon-small uk-icon-hover uk-icon-youtube"></span></a>
                                        <a href="https://t.me/sufara"><span
                                                class="uk-icon-small uk-icon-hover uk-icon-telegram"></span></a>
                                    </div>
                                </div>
                                <div class="clear"></div>

                                <p class="footer-about-text">
                                    موقع طبكم - tebkum موقع متخصص في كرة القدم العالمية منها والعربية يوفر لك العديد من الخدمات المهمة مثل ( الاخبار اليومية الدقيقة للرياضة العالمية ، نتائج المباريات والجداول للبطولات الساخنة ، معلومات عن اللاعبين ، البوم صور خاص باللاعبين ، الاهداف اليومية للبطولات الكبيرة ، وغيرها من الخدمات الممتعة ) .
                                </p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>


            <footer id="tm-footer" class="tm-footer">
                <div class="uk-panel">
                    <div class="uk-container uk-container-center">
                        <div class="uk-grid">
                            <div class="uk-width-1-1">
                                <div class="footer-wrap">
                                    <div class="copyrights">
                                        <p>&copy;
                                            <script>
                                                document.write(new Date().getFullYear());
                                            </script> كافة الحقوق محفوظة | تم تصميمه من
                                            قبل <a href="https://tebkum.com/" target="_blank">دروب
                                                السلام</a>
                                        </p>
                                    </div>
                                    <div class="foot-menu-wrap">
                                        <ul class="nav menu">
                                            <li class="item-165"><a href="">الأكثر مشاهدة</a></li>
                                            <li class="item-166">
                                                <a href="">أخبار</a>
                                            </li>
                                            <li class="item-167">
                                                <a href="">المقالات</a>
                                            </li>
                                            <li class="item-168">
                                                <a href="">سياسة الخصوصية</a>
                                            </li>
                                            <li class="item-169"><a href="">تواصل معنا</a></li>
                                        </ul>
                                    </div>

                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>




        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <ul class="uk-nav uk-nav-offcanvas">
                    <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
                    <li><a href="/tags/2/show">أخبار</a></li>
                    <li><a href="/tags/1/show">المقالات</a></li>
                    <li><a href="{{ url('/videos/show') }}">فيديوهات</a></li>
                    <li><a href="">تحليلات رياضية</a></li>
                    <li class="uk-parent">
                        <a href="">كرة القدم</a>
                        <ul class="uk-nav-sub">
                            <li><a href="/tags/4/show">كأس العالم 2022</a></li>
                        </ul>
                    </li>
                    <li class="uk-parent">
                        <a href="">المزيد</a>
                        <ul class="uk-nav-sub">
                            <li><a href="{{ url('/aboutus') }}">من نحن</a></li>
                                                <li><a href="{{ url('/policy') }}">سياسة الخصوصية</a></li>
                                                <li><a href="{{ url('/contactus') }}">تواصل معنا</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('main_page/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('main_page/js/uikit.js') }}"></script>
    <script type="text/javascript" src="{{ asset('main_page/js/SimpleCounter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('main_page/js/components/grid.js') }}"></script>
    <script type="text/javascript" src="{{ asset('main_page/js/components/slider.js') }}"></script>
    <script type="text/javascript" src="{{ asset('main_page/js/components/slideshow.js') }}"></script>
    <script type="text/javascript" src="{{ asset('main_page/js/components/slideset.js') }}"></script>
    <script type="text/javascript" src="{{ asset('main_page/js/components/sticky.js') }}"></script>
    <script type="text/javascript" src="{{ asset('main_page/js/components/lightbox.js') }}"></script>
    <script type="text/javascript" src="{{ asset('main_page/js/isotope.pkgd.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('main_page/js/theme.js') }}"></script>
    <script type="text/javascript">
        new SimpleCounter("countdown4", datatata, {
          'continue': 0,
          format: '{D} {H} {M} {S}',
          lang: {
              d: {
                  single: 'day',
                  plural: 'days'
              }, //days
              h: {
                  single: 'hr',
                  plural: 'hrs'
              }, //hours
              m: {
                  single: 'min',
                  plural: 'min'
              }, //minutes
              s: {
                  single: 'sec',
                  plural: 'sec'
              } //seconds
          },
          formats: {
              full: "<span class='countdown_number' style='color:  '>{number} </span> <span class='countdown_word' style='color:  '>{word}</span> <span class='countdown_separator'>:</span>", //Format for full units representation
              shrt: "<span class='countdown_number' style='color:  '>{number} </span>" //Format for short unit representation
          }
      });
    </script>
</body>

</html>
