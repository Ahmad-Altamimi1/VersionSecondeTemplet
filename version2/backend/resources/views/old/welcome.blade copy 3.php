@extends('layouts.welcome')

@section('content')
    <section id="hero-animated" class="hero-animated d-flex align-items-center">
        <div class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
            data-aos="zoom-out">
            <img style="max-height: 300px ;" src="img/شعار جامعتي-0١.png" class="img-fluid animated">
            <h2>أهلا وسهلا بك في <span>جامعتي</span></h2>
            <p>الموقع المتكامل لطلاب الجامعات الأردنية</p>
            <div class="d-flex">
                <a href="#about" class="btn-get-started scrollto">من نحن</a>
                <a href="https://www.youtube.com/watch?v=gpLKjintr1I"
                    class="glightbox btn-watch-video d-flex align-items-center"><i
                        class="bi bi-play-circle"></i><span>الفيديو
                        التعريفي</span></a>
            </div>
        </div>
    </section>

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>من نحن</h2>
                <p>جامعتي :هم الاوائل و رواد التعليم الارشاد الإلكتروني, اتاحت مجموعة كبيرة من النصائح والإرشادات للمقبلين
                    على الدراسة بالجامعات الأردنية. تجد كل ما تريده من خلال الموقع الإلكتروني</p>
            </div>



        </div>
    </section><!-- End About Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container" data-aos="zoom-out">

            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="img/Uni_logos/الجامعة-الاردنية.png" class="img-fluid"
                            alt=""></div>
                    <div class="swiper-slide"><img src="img/Uni_logos/الجامعة-الالمانبة-200x200.png" class="img-fluid"
                            alt=""></div>
                    <div class="swiper-slide"><img src="img/Uni_logos/الجامعة-الهاشمية-200x200.png" class="img-fluid"
                            alt=""></div>
                    <div class="swiper-slide"><img src="img/Uni_logos/جامعة-آل-البيت-200x200.png" class="img-fluid"
                            alt=""></div>
                    <div class="swiper-slide"><img src="img/Uni_logos/جامعة-البلقاء-التطبيقية-200x200.png" class="img-fluid"
                            alt=""></div>
                    <div class="swiper-slide"><img src="img/Uni_logos/جامعة-الحسين-بن-طلال-200x200.png" class="img-fluid"
                            alt=""></div>
                    <div class="swiper-slide"><img src="img/Uni_logos/جامعة-الطفيلة-التقنية-200x200.png" class="img-fluid"
                            alt=""></div>
                    <div class="swiper-slide"><img src="img/Uni_logos/جامعة-العلوم-والتكنولوجيا-200x200.png"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="img/Uni_logos/جامعة-اليرموك-200x200.png" class="img-fluid"
                            alt=""></div>
                    <div class="swiper-slide"><img src="img/Uni_logos/جامعة-مؤتة-200x200.png" class="uni_logo"
                            alt=""></div>
                </div>
            </div>

        </div>
    </section><!-- End Clients Section -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row g-5">

                <div class="col-lg-12">

                    <div style="text-align: right;" class="row gy-4 posts-list">

                        <?php
                        $xx = 0;
                        ?>
                        @foreach ($posts as $singlepost)
                            @if ($xx <= 10)
                                <div class="col-lg-4">
                                    <article class="d-flex flex-column">

                                        <div class="post-img">
                                            <img src="{{ asset('storage/' . $singlepost->IMG . '') }}" alt=""
                                                class="img-fluid">
                                        </div>

                                        <h2 class="title">
                                            <a href="/posts/{{ $singlepost->id }}/show">{{ $singlepost->TITLE }}</a>
                                        </h2>

                                        <div class="meta-top">
                                            <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-clock pl-2">
                                                    </i><time>
                                                        {{ \Carbon\Carbon::parse($singlepost->DATE)->format('Y/m/d H:i') }}</time>
                                                </li>
                                        </div>

                                        <div class="content">
                                            <p>
                                                {{ $singlepost->DESCRIPTION }}
                                            </p>
                                        </div>

                                        <div class="read-more mt-auto align-self-end">
                                            <a href="/posts/{{ $singlepost->id }}/show">اقرأ المزيد</a>
                                        </div>

                                    </article>
                                </div><!-- End post list item -->
                            @endif
                            <?php
                            $xx++;
                            ?>
                        @endforeach


                    </div><!-- End blog posts list -->


                </div>



            </div>

        </div>
    </section><!-- End Blog Section -->


    <!-- ======= الجامعات الاردنية ======= -->
    <section id="featured-services" class="featured-services">
        <div class="container">

            <div class="section-header">
                <h2>الجامعات الاردنية</h2>
                <p>يُقبل الحائزون على شهادة الثانوية العامة في الجامعات الحكومية أو الخاصة أو الكليات. تطبق معظم الجامعات في
                    الأردن النموذج الأمريكي الجامعي القائم على نظام الساعات الذي يمنح الطلبة المرونة لاختيار عدد الساعات
                    وأوقات الدوام الصباحي أو المسائي</p>
            </div>

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out">
                    <div style="text-align: center;" class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bookmark-check icon"></i></div>
                        <h4><a href="" class="stretched-link">الجامعات الحكومية</a></h4>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="200">
                    <div style="text-align: center;" class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bookmark-check icon"></i></div>
                        <h4><a href="" class="stretched-link">الجامعات الخاصة</a></h4>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="400">
                    <div style="text-align: center;" class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bookmark-check icon"></i></div>
                        <h4><a href="" class="stretched-link">جامعات إقليمية ودولية</a></h4>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div style="text-align: center;" class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bookmark-check icon"></i></div>
                        <h4><a href="" class="stretched-link">جامعات ذات قانون خاص</a></h4>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div style="text-align: center;" class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bookmark-check icon"></i></div>
                        <h4><a href="" class="stretched-link">المستشفيات الجامعية</a></h4>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div style="text-align: center;" class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bookmark-check icon"></i></div>
                        <h4><a href="" class="stretched-link">الكليات الجامعية</a></h4>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div style="text-align: center;" class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bookmark-check icon"></i></div>
                        <h4><a href="" class="stretched-link">أكاديميات خاصة</a></h4>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div style="text-align: center;" class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bookmark-check icon"></i></div>
                        <h4><a href="" class="stretched-link">كليات تابعة للأونروا</a></h4>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div style="text-align: center;" class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bookmark-check icon"></i></div>
                        <h4><a href="" class="stretched-link">الكليات التطبيقية التابعة لجامعة البلقاء التطبيقية
                            </a></h4>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="zoom-out" data-aos-delay="600">
                    <div style="text-align: center;" class="service-item position-relative">
                        <div class="icon"><i class="bi bi-bookmark-check icon"></i></div>
                        <h4><a href="" class="stretched-link">فروع الجامعات الحكومية</a></h4>
                    </div>
                </div><!-- End Service Item -->


            </div>

        </div>
    </section><!-- الجامعات الاردنية-->



    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2>مقاطع فيديو مختارة</h2>
            </div>

            <div class="row gy-5">

                <?php
                $xx = 0;
                ?>
                @foreach ($videos as $video)
                    @if ($xx <= 2)
                        <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                            <div class="service-item">
                                <div class="img">
                                    <img src="{{ asset('storage/' . $video->IMG . '') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="details position-relative">
                                    <a href="/videos/{{ $video->id }}/show" class="stretched-link">
                                        <h3>{{ $video->TITLE }}</h3>
                                    </a>
                                    <p>{{ $video->DESCRIPTION }}</p>
                                </div>
                            </div>
                        </div><!-- End Service Item -->
                    @endif
                    <?php
                    $xx++;
                    ?>
                @endforeach


            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Call To Action Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="zoom-out">

            <div class="row g-5">

                <div class="col-lg-8 col-md-6 content d-flex flex-column justify-content-center order-last order-md-first">
                    <h3><em>جامعتي</em></h3>
                    <p>هي من منظومة إعلامية متخصصة بالجامعات والتعليم العالي ، ينضوي تحتها العديد من البرامج الإعلامية
                        المختلفة ، تهدف المنظومة إلى ربط الجامعات بالمستفيدين بشكل عام والطلبة الجدد بشكل خاص ، كما وتعد
                        المنظومة الأولى من نوعها على مستوى الوطن العربي في الجنب الإعلامي .</p>
                </div>

                <div class="col-lg-4 col-md-6 order-first order-md-last d-flex align-items-center">
                    <div class="img">
                        <img src="img/شعار جامعتي-0١.png" alt="" class="img-fluid">
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Call To Action Section -->
@endsection
