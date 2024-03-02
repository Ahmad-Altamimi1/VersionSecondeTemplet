@extends('layouts.welcome')

@section('content')
    <main id="main">

        <section id="hero-animated" class="hero-animated d-flex align-items-center">
            <div style="direction: rtl; padding-top: 100px; padding-bottom: 400px" class="container d-flex flex-column justify-content-center align-items-center text-center position-relative"
                data-aos="zoom-out">
                <h2> تسجيل الدخول</h2>
                <div class="container">
                    <div class="row text-right">
                        <div  class="col-12 pt-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">
                                        <p>البريد الإلكتروني</p>
                                    </label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">
                                        <p>كلمة السر</p>
                                    </label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <!--
                                    <div class="row mb-3">
                                        <div class="col-md-6 offset-md-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            
                                                <label class="form-check-label" for="remember">
                                                    تذكرني
                                                </label>
                                            </div>
                                        </div>
                                    </div> -->

                                <div style="text-align: center ;" class="row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-warning">
                                            تسجيل الدخول
                                        </button>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                هل نسيت كلمة المرور ؟
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>






    </main><!-- End #main -->
@endsection
