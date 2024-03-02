<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('main_page/assets/img/favicon.png') }}">
    <link rel="icon" href="{{ asset('main_page/assets/img/favicon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- vector map CSS -->
    <link href="{{ asset('control/vendors/vectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Data Table CSS -->
    <link href="{{ asset('control/vendors/datatables.net-dt/css/jquery.dataTables.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('control/vendors/datatables.net-responsive-dt/css/responsive.dataTables.min.css') }}"
        rel="stylesheet" type="text/css" />


    <!-- Toggles CSS -->
    <link href="{{ asset('control/vendors/jquery-toggles/css/toggles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('control/vendors/jquery-toggles/css/themes/toggles-light.css') }}" rel="stylesheet"
        type="text/css">

    <!-- Toastr CSS -->
    <link href="{{ asset('control/vendors/jquery-toast-plugin/dist/jquery.toast.min.css') }}" rel="stylesheet"
        type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('control/dist/css/style.css') }}" rel="stylesheet" type="text/css">

    <!-- select2 CSS -->
    <link href="{{ asset('control/vendors/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />



    <!-- Bootstrap Dropzone CSS -->
    <link href="{{ asset('control/vendors/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Dropzone CSS -->
    <link href="{{ asset('control/vendors/dropify/dist/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Almarai', sans-serif;
        }
    </style>

    <link rel='stylesheet' href='{{ asset('control/textEditor/summernote-lite.css') }}'>

    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script src="{{ asset('js/ar.js') }}"></script>

</head>

<body>

    <div class="hk-wrapper hk-vertical-nav">

        <!-- Top Navbar -->
        <nav class="navbar navbar-expand-xl navbar-light fixed-top hk-navbar">
            <a id="navbar_toggle_btn" class="navbar-toggle-btn nav-link-hover" href="javascript:void(0);"><i
                    class="ion ion-ios-menu"></i></a>
            <a class="navbar-brand" href="dashboard1.html">
                <img class="brand-img d-inline-block mr-5" src="img/logo_small.png" alt="" />
            </a>
            <ul class="navbar-nav hk-navbar-content">

                <li class="nav-item dropdown dropdown-authentication">
                    <a class="nav-link dropdown-toggle no-caret" href="#" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <div class="media">
                            <div class="media-img-wrap">
                                <div class="avatar">
                                    <img src="{{ asset('img/avatar10.jpg') }}" alt="user"
                                        class="avatar-img rounded-circle">
                                </div>
                                <span class="badge badge-success badge-indicator"></span>
                            </div>
                            <div class="media-body">
                                <span>{{ Auth::user()->name }}<i class="zmdi zmdi-chevron-down"></i></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" data-dropdown-in="flipInX"
                        data-dropdown-out="flipOutX">
                        <a class="dropdown-item" href="/profile/{{ Auth::user()->id }}/edit"><i
                                class="dropdown-icon zmdi zmdi-account"></i><span>الملف الشخصي</span></a>
                        <a class="dropdown-item" href="{{ url('/') }}"><i
                                class="dropdown-icon zmdi zmdi-card"></i><span>الموقع الرئيسي</span></a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i
                                class="dropdown-icon zmdi zmdi-power"></i><span>تسجيل الخروج</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <nav class="hk-nav hk-nav-light">
            <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i
                        data-feather="x"></i></span></a>
            <div class="nicescroll-bar">
                <div class="navbar-nav-wrap">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/dashboard') }}">
                                <i class="ion ion-ios-keypad"></i>
                                <span class="nav-link-text">لوحة التحكم</span>
                            </a>
                        </li>

                        @if (Auth::user()->admin || Auth::user()->B2)
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#app_drp">
                                    <i class="ion ion-ios-apps"></i>
                                    <span class="nav-link-text">البرامج</span>
                                </a>
                                <ul id="app_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="/programs">البرامج</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/programs/create">إضافة برنامج جديد</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        @if (Auth::user()->admin || Auth::user()->B0 || Auth::user()->B1)
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#pages_drp">
                                    <i class="ion ion-ios-copy"></i>
                                    <span class="nav-link-text">الفيديوهات والمقالات</span>
                                </a>
                                <ul id="pages_drp" class="nav flex-column collapse collapse-level-1 collapse show">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('posts.index')}}">المقالات</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('posts.create')}}">إضافة مقال جديد</a>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/videos">الفيديوهات</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/videos/create">إضافة فيديو جديد</a>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/posts/pictures">الصور</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/posts/addpictures">إضافة صورة جديدة</a>
                                            </li>
                                            <div class="dropdown-divider"></div>
                                            @if (Auth::user()->admin || Auth::user()->B0)
                                                <li class="nav-item">
                                                    <a class="nav-link"href="{{route('tags.index')}}">إدارة العناوين</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"href="{{route('tags.create')}}">إضافة عنوان جديد</a>
                                                </li>
                                                <div class="dropdown-divider"></div>
                                                <li class="nav-item">
                                                    <a class="nav-link"href="{{route('groups.index')}}">إدارة المجموعات</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link"href="{{route('groups.create')}}">إضافة مجموعة جديدة</a>
                                                </li>
                                            @endif

                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        @if (Auth::user()->admin || Auth::user()->B2)
                            <l i class="nav-item">
                                <a class="nav-link" href="javascript:void(0);" data-toggle="collapse"
                                    data-target="#appp_drp">
                                    <i class="ion ion-ios-apps"></i>
                                    <span class="nav-link-text">إدارة المحتوى</span>
                                </a>
                                <ul id="appp_drp" class="nav flex-column collapse collapse-level-1">
                                    <li class="nav-item">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="/programs"></a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="/contenmangment">إدارة المحتوى</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                </li>
                        @endif
                        @if (Auth::user()->admin == '1')
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/userscontrol') }}">
                                    <i class="ion ion-ios-construct"></i>
                                    <span class="nav-link-text">التحكم بأعضاء الموقع</span>
                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ url('/showdayaction') }}">
                                    <i class="ion ion-ios-stats"></i>
                                    <span class="nav-link-text">مشاهدة النشاط اليومي</span>
                                </a>
                            </li>
                        @endif

                    </ul>


                </div>
            </div>
        </nav>
        <div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>

        <!-- /Vertical Nav -->


        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Container -->
            <div class="container-fluid mt-xl-50 mt-sm-30 mt-15">
                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12">



                        @yield('content')


                    </div>
                </div>
                <!-- /Row -->
            </div>
            <!-- /Container -->

            <!-- Footer -->
            <div class="hk-footer-wrap container">
                <footer class="footer">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <p>&copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> كافة الحقوق محفوظة | تم تصميمه من
                                قبل <a href="http://doroobmedia.com/" target="_blank">دروب السلام</a>
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- /Footer -->
        </div>
        <!-- /Main Content -->


    </div>



    <!-- jQuery -->
    <script src="{{ asset('control/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script>
        $(document).on('click', '.delete-btn', function(e) {
            e.preventDefault();

            var button = $(this);
            var liElement = button.closest('li');
            var dataId = button.data('id');
            var name = button.text();
            console.log('button', button[0]);
            console.log(' deleteButton.text()', button.text());
            var sectionId = button.data('sectionid');
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            newoption(name, dataId)
            var requestDataToDelete = {
                id: dataId,
                sectionId: sectionId,
                _token: csrfToken,
            };
            console.log('requestDataToDelete', requestDataToDelete);

            // Make AJAX request
            $.ajax({
                type: 'PATCH',
                url: '/managcontentdelete',
                data: requestDataToDelete,
                success: function(response) {
                    console.log(response);
                    console.log('deleted successfully');

                    // Perform additional actions if needed, such as removing the list item
                    liElement.remove();
                },
                error: function(error) {
                    console.error(error);
                },
            });
        });
    </script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('control/vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('control/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JavaScript -->
    <script src="{{ asset('control/dist/js/jquery.slimscroll.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('control/dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('control/dist/js/feather.min.js') }}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{ asset('control/vendors/jquery-toggles/toggles.min.js') }}"></script>
    <script src="{{ asset('control/dist/js/toggle-data.js') }}"></script>

    <!-- Counter Animation JavaScript -->
    <script src="{{ asset('control/vendors/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('control/vendors/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <!-- Sparkline JavaScript -->
    <script src="{{ asset('control/vendors/jquery.sparkline/dist/jquery.sparkline.min.js') }}"></script>

    <!-- Vector Maps JavaScript -->
    <script src="{{ asset('control/vendors/vectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('control/vendors/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('control/dist/js/vectormap-data.js') }}"></script>

    <!-- Owl JavaScript -->
    <script src="{{ asset('control/vendors/owl.carousel/dist/owl.carousel.min.js') }}"></script>

    <!-- Toastr JS -->
    <script src="{{ asset('control/vendors/jquery-toast-plugin/dist/jquery.toast.min.js') }}"></script>

    <!-- Apex JavaScript -->
    <script src="{{ asset('control/vendors/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('control/dist/js/irregular-data-series.js') }}"></script>

    <!-- Init JavaScript -->
    {{-- <script src="{{ asset('control/dist/js/dashboard-data.js') }}"></script> --}}


    <!-- Dropzone JavaScript -->
    <script src="{{ asset('control/vendors/dropzone/dist/dropzone.js') }}"></script>

    <!-- Dropify JavaScript -->
    <script src="{{ asset('control/vendors/dropify/dist/js/dropify.min.js') }}"></script>

    <!-- Form Flie Upload Data JavaScript -->
    <script src="{{ asset('control/dist/js/form-file-upload-data.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('control/dist/js/feather.min.js') }}"></script>


    <!-- Data Table JavaScript -->
    <script src="{{ asset('control/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('control/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('control/vendors/datatables.net-dt/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('control/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('control/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('control/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('control/vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('control/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('control/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('control/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('control/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('control/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('control/dist/js/dataTables-data.js') }}"></script>

    <!-- Tinymce JavaScript -->
    <script src="{{ asset('control/vendors/tinymce/tinymce.min.js') }}"></script>

    <!-- Tinymce Wysuhtml5 Init JavaScript -->
    <script src="{{ asset('control/dist/js/tinymce-data.js') }}"></script>

    <!-- Pickr JavaScript -->
    <script src="{{ asset('control/vendors/pickr-widget/dist/pickr.min.js') }}"></script>
    <script src="{{ asset('control/dist/js/pickr-data.js') }}"></script>

    <!-- Daterangepicker JavaScript -->
    <script src="{{ asset('control/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('control/vendors/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('control/dist/js/daterangepicker-data.js') }}"></script>

    <!-- FeatherIcons JavaScript -->
    <script src="{{ asset('control/dist/js/feather.min.js') }}"></script>

    <!-- Toggles JavaScript -->
    <script src="{{ asset('control/vendors/jquery-toggles/toggles.min.js') }}"></script>
    <script src="{{ asset('control/dist/js/toggle-data.js') }}"></script>

    <!-- Init JavaScript -->
    <script src="{{ asset('control/dist/js/init.js') }}"></script>

    <!-- Select2 JavaScript -->
    <script src="{{ asset('control/vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('control/dist/js/select2-data.js') }}"></script>


    <script>
        "use strict";


        var chartArea = new ApexCharts(
            document.querySelector("#area_adwords"),
            optionsArea
        );
        chartArea.render();
    </script>

    <script src='{{ asset('control/textEditor/summernote-lite.js') }}'></script>
    <script src="{{ asset('control/textEditor/script.js') }}"></script>
    <script src="{{ asset('control/dist/js/init.js') }}"></script>
</body>

</html>
