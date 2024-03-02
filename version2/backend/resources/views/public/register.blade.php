<!DOCTYPE html>
<html lang="en">

<head>
    <title>طبكم - tebkum</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('main_page/assets/img/favicon.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginfiles/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('loginfiles/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('loginfiles/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginfiles/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginfiles/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginfiles/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginfiles/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginfiles/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('loginfiles/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('loginfiles/css/main.css') }}">
    <!--===============================================================================================-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Almarai', sans-serif;

        }

        .invalid-feedback {
            display: block;
        }
    </style>


</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form style="text-align: right;" class="login100-form validate-form" method="POST"
                    action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title p-b-26">
                        طبكم - tebkum
                    </span>
                    <span class="login100-form-title p-b-26">
                        تسجيل الإشتراك
                     </span>

                    <div class="wrap-input100 validate-input">
                        <input id="name" type="text" class="input100 @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>


                        <span class="focus-input100" data-placeholder="الاسم"></span>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input">
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">



                        <span class="focus-input100" data-placeholder="البريد الإلكتروني"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>



                    <div class="wrap-input100 validate-input">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror"
                            name="password" required autocomplete="new-password">



                        <span class="focus-input100" data-placeholder="كلمة السر"></span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input id="password-confirm" type="password" class="input100" name="password_confirmation"
                            required autocomplete="new-password">
                        <span class="focus-input100" data-placeholder="إعادة كتابة كلمة السر"></span>
                    </div>




                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                تسجيل الإشتراك
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                            هل لديك حساب ?
                        </span>

                        <a class="txt2" href="{{ url('/login') }}">
                            تسجيل الدخول
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('loginfiles/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginfiles/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginfiles/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('loginfiles/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginfiles/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginfiles/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('loginfiles/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginfiles/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('loginfiles/js/main.js') }}"></script>

</body>

</html>
