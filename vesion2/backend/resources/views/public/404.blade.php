@extends('layouts.welcome')

@section('content')
    <div class="ltn__utilize-overlay"></div>

    <!-- BREADCRUMB AREA START -->

    <!-- BREADCRUMB AREA END -->

    <!-- 404 area start -->
    <div class="ltn__404-area ltn__404-area-1 mb-120 mt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="error-404-inner text-center">
                        <h1 class="error-404-title">404</h1>
                        <h2>!الصفحة غير موجودة</h2>
                        <!-- <h3>Oops! Looks like something going rong</h3> -->
                        <p> الصفحة التي تبحث عنها غير موجودة. ربما تم نقلها أو حذفها.</p>
                        <div class="btn-wrapper">
                            <a href="{{ route('home') }}" class="btn btn-transparent"><i class="fas fa-long-arrow-alt-left"></i> العوده للصفحة الرئيسية </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- 404 area end -->

    <!-- BRAND LOGO AREA START -->

   @endsection
