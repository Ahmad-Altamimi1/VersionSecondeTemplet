@extends('layouts.dashboard')

@section('content')
    <script src="{{ asset('js/main.js') }}"></script>

    <?php
    include 'js/arabicdate.php';
    $datenow = strtotime('-3:00');
    $d = date('Y-m-d', $datenow);
    $dnav = ArabicDate();
    
    ?>
    <section class="hk-sec-wrapper text-right">
        <!-- Row -->

        <div dir="rtl" class="row">
            <div class="col-xl-12">
                <section class="hk-sec-wrapper">
                    <h5 class="hk-sec-title">قائمة النشاط ليوم <?php echo $dateday; ?></h5>
                    <h6 class="mt-30 mb-20">عدد زيارات الموقع الفريدة : <?php echo $visitors->count(); ?></h6>
                    <h6>عدد زيارات الموقع الكلية : <?php
                    $num = 0; // Add a semicolon here to terminate the statement
                    foreach ($postscount as $post) {
                        $num = $num + $post->REED;
                    }
                    echo $num; ?></h6>
                    <h6 class="mt-30 mb-20">اختيار يوم آخر</h6>
                    <form action="/showdaysaction" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col">
                                <input class="form-control" name="date" type="date" value="{{ $d }}" />
                                @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>التاريخ مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary">مشاهدة</button>
                            </div>

                        </div>
                    </form>

                    <h5 class="mt-30 mb-20 hk-sec-title ">المقالات (<?php echo count($posts); ?>)</h5>

                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                                    <thead>
                                        <tr>
                                            <th>عنوان المقال</th>
                                            <th>تاريخ الإنشاء</th>
                                            <th>تاريخ النشر على الموقع</th>
                                            <th>عدد المشاهدات</th>
                                            <th>التصنيف الرئيسي</th>
                                            <th>التصنيفات الفرعية</th>
                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->TITLE }}</td>
                                                <td>{{ $post->DATE }}</td>
                                                <td>{{ $post->DATE_SCHEDULER }}</td>
                                                <td>{{ $post->REED }}</td>
                                                <td>
                                                    @foreach ($poststags as $singletag)
                                                        @if ($post->TOPIC == $singletag->id)
                                                            {{ $singletag->TITLE }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <?php
                                                    $string = $post->TAG;
                                                    $str_arr = explode(',', $string);
                                                    ?>
                                                    @foreach ($str_arr as $stag)
                                                        @foreach ($poststags as $singletag)
                                                            @if ($stag == $singletag->id)
                                                                {{ $singletag->TITLE . ',' }}
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>

                                                <td><a class="btn btn-primary" type="button"
                                                        href="/posts/{{ $post->id }}/edit">تعديل</a></td>
                                                <td><a type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal{{ $post->id }}">حذف</a></td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <h5 class="mt-30 mb-20 hk-sec-title ">الفيديوهات (<?php echo count($videos); ?>)</h5>
                    <div class="row">
                        <div class="col-sm">
                            <div class="table-wrap">
                                <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                                    <thead>
                                        <tr>
                                            <th>عنوان الفيديو</th>
                                            <th>تاريخ الإنشاء</th>
                                            <th>عدد المشاهدات</th>
                                            <th>التصنيف الرئيسي</th>
                                            <th>التصنيفات الفرعية</th>
                                            <th>المزيد من المعلومات</th>
                                            <th>تعديل</th>
                                            <th>حذف</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($videos as $video)
                                            <tr>
                                                <td>{{ $video->TITLE }}</td>
                                                <td>{{ $video->DATE }}</td>
                                                <td>{{ $video->REED }}</td>
                                                <td>
                                                    @foreach ($poststags as $singletag)
                                                        @if ($video->TOPIC == $singletag->id)
                                                            {{ $singletag->TITLE }}
                                                        @endif
                                                    @endforeach
                                                </td>
                                                <td>
                                                    <?php
                                                    $string = $video->TAG;
                                                    $str_arr = explode(',', $string);
                                                    ?>
                                                    @foreach ($str_arr as $stag)
                                                        @foreach ($poststags as $singletag)
                                                            @if ($stag == $singletag->id)
                                                                {{ $singletag->TITLE . ',' }}
                                                            @endif
                                                        @endforeach
                                                    @endforeach
                                                </td>
                                                <td><a class="btn btn-primary" type="button" data-toggle="modal"
                                                        data-target="#exampleModalLarge{{ $video->id }}">المزيد من
                                                        المعلومات</a></td>
                                                <td><a class="btn btn-primary" type="button"
                                                        href="/videos/{{ $video->id }}/edit">تعديل</a></td>
                                                <td><a type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#exampleModal{{ $video->id }}">حذف</a></td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
        <!-- /Row -->


    </section>



    @foreach ($videos as $video)
        <tr>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalLarge{{ $video->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLarge{{ $video->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $video->TITLE }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                @csrf
                                @method('PATCH')

                                <div style="text-align: right;" class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="TITLE">عنوان الفيديو</label>
                                            <input readonly required id="TITLE" type="text"
                                                class="form-control @error('TITLE') is-invalid @enderror" name="TITLE"
                                                value="{{ $video->TITLE }}" autocomplete="TITLE" autofocus>

                                        </div>
                                    </div>
                                </div>
                                <div style="text-align: right;" class="row">

                                    <div class="col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="TOPIC">تصنيف الفيديو الرئيسي</label>
                                            <select readonly required id="TOPIC" name="TOPIC"
                                                class="form-control select2">
                                                <option value="" selected></option>
                                                @foreach ($poststags as $poststag)
                                                    <option @if ($poststag->id == $video->TOPIC) {{ 'selected' }} @endif
                                                        value="{{ $poststag->id }}">{{ $poststag->TITLE }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    $string = $video->TAG;
                                    $str_arr = explode(',', $string);
                                    ?>
                                    <div class="col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="TAG">التصنيفات</label>
                                            <select readonly required id="TAG" name="TAG[]" class="form-control"
                                                multiple="multiple">
                                                @foreach ($poststags as $poststag)
                                                    <option
                                                        @foreach ($str_arr as $stag)
                                                    @if ($stag == $poststag->id) {{ 'selected' }} @endif @endforeach
                                                        value="{{ $poststag->id }}">{{ $poststag->TITLE }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div style="text-align: center;" class="row">

                                    <div class="col-md-12 col-sm-12 col-12">
                                        <p style="text-align: right;" for="tital">صورة الفيديو
                                        </p>
                                        <img style="max-height: 200px; text-align: center;"
                                            src="{{ asset('storage/' . $video->IMG . '') }}" alt="">
                                    </div>
                                </div>

                                <div style="text-align: center;" class="row">

                                    <div class="col-md-12 col-sm-12 col-12">
                                        <p style="text-align: right;" for="tital">الفيديو
                                        </p>
                                        <iframe width="420" height="315"
                                            src="https://www.youtube.com/embed/{{ $video->VID }}">
                                        </iframe>
                                    </div>
                                </div>

                                <div style="text-align: right;" class="form-group pt-3">
                                    <label for="DESCRIPTION">الوصف</label>
                                    <textarea style="text-align: right;" readonly required class="form-control mt-15" rows="6" id="DESCRIPTION"
                                        name="DESCRIPTION">{{ $video->DESCRIPTION }}</textarea>

                                </div>


                                <div style="text-align: center;" class="row">
                                    <div class="col-xl-12">
                                        <?php echo $video->TEXT1; ?>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                            <a class="btn btn-primary" type="button" href="/videos/{{ $video->id }}/edit">تعديل</a>
                        </div>
                    </div>
                </div>
            </div>
        </tr>
    @endforeach

    @foreach ($videos as $video)
        <div class="modal fade" id="exampleModal{{ $video->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $video->TITLE }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>هل تريد حذف فيديو "{{ $video->TITLE }}"</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                        <form action="/videos/delete/{{ $video->id }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $video->id }}">
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($posts as $post)
        <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $post->TITLE }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>هل تريد حذف بوست "{{ $post->TITLE }}"</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                        <form action="/posts/delete/{{ $post->id }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <button onclick="tinyMCEwwww();" class="btn btn-danger" type="submit">حذف</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
