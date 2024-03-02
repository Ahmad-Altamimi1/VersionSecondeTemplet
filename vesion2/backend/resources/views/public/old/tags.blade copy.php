@extends('layouts.welcome')

@section('content')
    <main id="main">



        <!-- ======= tags Section ======= -->
        <section id="services" class="services">
            <div class="container pt-3" data-aos="fade-up">

                <div class="row pt-5">
                    <div class="col-12 ">
                        <div class="section-header">
                            <h2>{{ $tag->TITLE }}</h2>
                            <p>{{ $tag->DESCRIPTION }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End tags Section -->

        <!-- ======= tags Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="row gy-5">


                    @foreach ($tagposts as $singlepost)
                    <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="service-item">
                            <div class="img">
                                <img src="{{ asset('storage/' . $singlepost->IMG . '') }}" class="img-fluid" alt="">
                            </div>
                            <div class="details position-relative">
                                <a href="/posts/{{ $singlepost->id }}/show" class="stretched-link">
                                    <h3>{{ $singlepost->TITLE }}</h3>
                                </a>
                                <p>{{ $singlepost->DESCRIPTION }}</p>
                            </div>
                        </div>
                    </div><!-- End Service Item -->
                    @endforeach





                </div>

            </div>
        </section><!-- End tags Section -->

    </main><!-- End #main -->
@endsection
