@extends('layouts.welcome')

@section('content')
    <div class="tm-top-a-box tm-full-width tm-box-bg-1 ">
        <div class="uk-container uk-container-center">
            <section id="tm-top-a" class="tm-top-a uk-grid uk-grid-collapse" data-uk-grid-match="{target:'> div > .uk-panel'}"
                data-uk-grid-margin="">

                <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                        <?php $pic = 'main_page/images/2022/' . rand(1, 6) . '.jpg'; ?>
                        <div class="uk-cover-background uk-position-relative head-wrap"
                            style="height: 290px; background-image: url('{{ asset($pic) }}');">
                            <img class="uk-invisible" src="{{ asset($pic) }}" alt="" height="290"
                                width="1920">
                            <div class="uk-position-cover uk-flex uk-flex-center head-title">
                                {{-- <h1>{{ $post->TITLE }}</h1> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="uk-container uk-container-center alt" dir="rtl">
        <ul class="uk-breadcrumb">
            <li><a href="{{ url('/') }}">الصفحة الرئيسية</a></li>
            <li><a href="/aboutus">
                تواصل معنا
                </a></li>
        </ul>
    </div>
<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">البريد الالكتروني</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <input type="text" id="phone" name="phone" class="form-control">
                                <label for="phone" class="">رقم الهاتف</label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">الموضوع</label>
                        </div>
                    </div>
                </div>


                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Your message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

            </form>

            <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
            </div>
            <div class="status"></div>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>San Francisco, CA 94126, USA</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 01 234 567 89</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>contact@mdbootstrap.com</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->

    </div>

</section>
<!--Section: Contact v.2-->
    <div class="tm-bottom-a-box  "dir="rtl">
        <div class="uk-container uk-container-center">
            <section id="tm-bottom-a" class="tm-bottom-a uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                <div class="uk-width-1-1 uk-row-first">
                    <div class="uk-panel">
                        <div class="contact-page">
                            <div class="uk-grid">
                                <div class="uk-width-1-1">
                                    <div class="contact-title">
                                        <h2>تواصل معنا</h2>
                                    </div>
                                    <div class="contact-text">منصة طبكم هي منصة إعلامية رقمية تعمل على نشر رسالتها في تعزيز ورفع الوعي الصحي والثقافة الصحية للمستخدم العربي.</div>
                                </div>
                                <div class="uk-width-1-1">
                                    <div class="contact-socials-wrap">
                                        <ul class="contact-socials">
                                            <li><a href="https://www.facebook.com/tebkum"><i class="uk-icon-facebook"></i></a></li>
                                            <li><a href="https://twitter.com/tebkum"><i class="uk-icon-twitter"></i></a></li>

                                            <li><a href="https://www.youtube.com/@Tebkum"><i class="uk-icon-youtube"></i></a></li>
                                            <li><a href="https://www.instagram.com/tebkum"><i class="uk-icon-instagram"></i></a></li>
                                            <li><a href="https://www.tiktok.com/tebkum"><i class="uk-icon-flickr"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-grid" data-uk-grid-match="{target:'.contact-enquiries'}"dir="rtl">
                                <div class="uk-width-medium-1-1 uk-panel">
                                    <div style="min-height: 139px;" class="contact-enquiries">
                                        <div class="title">دروب السلام</div>
                                        <div class="phone">
                                            +962789360440<i class="uk-icon-phone"></i></div>
                                        <div class="mail">

                                            <a href="malto:info@doroobmedia.com">
                                                info@doroobmedia.com
                                            </a>
                                            <i class="uk-icon-envelope"></i>
                                        </div>
                                        <div class="location">
                                            استديوهات دروب – شارع الصخرة المشرفة – مقابل متحف الدبابات الملكي – عمان – الأردن<i class="uk-icon-map-marker"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>





@endsection
