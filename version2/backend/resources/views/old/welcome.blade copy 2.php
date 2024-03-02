@extends('layouts.welcome')

@section('content')
    <div class="tm-heroslider-area bg-grey">
        <div class="tm-heroslider-slider">
            <div class="tm-heroslider">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-8 order-2 order-md-1">
                            <div class="tm-heroslider-contentwrapper">
                                <div class="tm-heroslider-content">
                                    <h1>برنامج دعاة</h1>
                                    <p>برنامج دعوي إعلامي يناقش مفاهيم الدعوة إلى الله وأساليبها ووسائلها من خلال
                                        محادثات مع عدد من الدعاة الأفاضل</p>
                                    <a href="#حلقات_البرنامج" class="btn btn-primary btn-lg ts-scroll" data-bg-color="#f6a343"
                                        style="background-color: rgb(246, 163, 67); border-color: rgb(246, 163, 67);">مشاهدة
                                        حلقات الموسم الثاني</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-4 order-1 order-md-2">
                            <div class="tm-heroslider-image">
                                <iframe width="420" height="315"
                                    src="https://www.youtube.com/embed/{{ $programsvideos[0]->VID }}">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <main id="حلقات_البرنامج" class="page-content">


        <div id="tm-service-area" class="tm-section tm-service-area tm-padding-section bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-8 col-md-9 col-12">
                        <div class="tm-sectiontitle text-center">
                            <h2>حلقات البرنامج الكاملة</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-30-reverse">
                    @foreach ($programsvideos as $video)
                        @if (1)
                            <div class="col-lg-4 col-md-6 col-12 mt-30">
                                <div class="tm-service text-center tm-scrollanim">
                                    <div class="tm-service-inner">
                                        <div class="tm-service-frontside"
                                            data-bgimage="{{ asset('storage/' . $video->IMG . '') }}">
                                            <h6>{{ $video->TITLE }}</h6>
                                        </div>
                                        <div class="tm-service-backside">
                                            <h6><a
                                                    href="/program/{{ $video->PROGRAM }}/{{ $video->id }}">{{ $video->TITLE }}</a>
                                            </h6>
                                            <p>{{ $video->DESCRIPTION }}</p>
                                            <a href="/program/{{ $video->PROGRAM }}/{{ $video->id }}"
                                                class="tm-readmore">مشاهدة</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>




    </main>




    <!-- تغريدات دعوية -->
    <div class="tm-section tm-testimonial-area tm-padding-section-bottom bg-white bg-pattern-transparent pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-8 col-md-9 col-12">
                    <div class="tm-sectiontitle text-center">
                        <h2>تغريدات دعوية</h2>
                    </div>
                </div>
            </div>
            <div class="row tm-testimonial-slider">
                @foreach ($posts as $post)
                    @if ($post->TOPIC == '14')
                        <div class="col-lg-6">
                            <div class="tm-testimonial tm-scrollanim">
                                <p>{{ $post->DESCRIPTION }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <!--  -->
@endsection
