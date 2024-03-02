<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>قريباً</title>
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@800&family=Noto+Kufi+Arabic&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            font-family: 'Noto Kufi Arabic', sans-serif;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
    <style>
        .soon {
            margin: 0;
            padding: 0;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 50pt;
        }
    </style>
</head>

<body>
    @if (Route::has('login'))
        <div class="row">
            <div class="col-12">
                @auth
                    @if (Auth::user()->admin == '1')
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">لوحة التحكم</a>
                    @endif

                    <a class="btn btn-primary btn-lg" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        تسجيل الخروج
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">تسجيل الدخول</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-secondary btn-lg">الإشتراك</a>
                    @endif
                @endauth
            </div>
        </div>
    @endif
    <div class="row soon">
        <div class="col-12">
            <span>قريباً</span>
        </div>
    </div>
</body>

</html>
