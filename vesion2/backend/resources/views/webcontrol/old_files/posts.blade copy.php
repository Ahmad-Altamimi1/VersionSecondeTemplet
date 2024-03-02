@extends('layouts.dashboard')

@section('content')
    <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">المقالات والأخبار (<?php echo count($posts); ?>)</h5>
        <a class="btn btn-primary" type="button" href="/posts/create">إضافة مقال جديد</a>
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
                                <th>المزيد من المعلومات</th>
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
                                    <td><a class="btn btn-primary" type="button" data-toggle="modal"
                                            data-target="#exampleModalLarge{{ $post->id }}">المزيد من المعلومات</a></td>
                                    <td><a class="btn btn-primary" type="button"
                                            href="/posts/{{ $post->id }}/edit">تعديل</a></td>
                                    <td><a type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $post->id }}">حذف</a></td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @foreach ($posts as $post)
        <tr>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalLarge{{ $post->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLarge{{ $post->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $post->TITLE }}</h5>
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
                                            <label for="TITLE">عنوان المقال</label>
                                            <input readonly required id="TITLE" type="text"
                                                class="form-control @error('TITLE') is-invalid @enderror" name="TITLE"
                                                value="{{ $post->TITLE }}" autocomplete="TITLE" autofocus>

                                        </div>
                                    </div>
                                </div>
                                <div style="text-align: right;" class="row">

                                    <div class="col-md-6 col-sm-12 col-12">
                                        <div class="form-group">
                                            <label for="TOPIC">تصنيف المقال الرئيسي</label>
                                            <select readonly required id="TOPIC" name="TOPIC"
                                                class="form-control select2">
                                                <option value="" selected></option>
                                                @foreach ($poststags as $poststag)
                                                    <option @if ($poststag->id == $post->TOPIC) {{ 'selected' }} @endif
                                                        value="{{ $poststag->id }}">{{ $poststag->TITLE }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                    $string = $post->TAG;
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

                                <div class="row">

                                    <div class="col-md-12 col-sm-12 col-12">
                                        <p style="text-align: right;" for="tital">صورة المقال (ان لم تقم برفع صورة جديدة
                                            سيتم عرض الصورة القديمة)
                                        </p>
                                        <img style="max-height: 200px; text-align: center;"
                                            src="{{ asset('storage/' . $post->IMG . '') }}" alt="">
                                    </div>
                                </div>

                                <div style="text-align: right;" class="form-group pt-3">
                                    <label for="DESCRIPTION">الوصف</label>
                                    <textarea style="text-align: right;" readonly required class="form-control mt-15" rows="6" id="DESCRIPTION"
                                        name="DESCRIPTION">{{ $post->DESCRIPTION }}</textarea>

                                </div>


                                <div style="text-align: center;" class="row">
                                    <div class="col-xl-12">
                                        <?php echo $post->TEXT1; ?>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                            <a class="btn btn-primary" type="button" href="/posts/{{ $post->id }}/edit">تعديل</a>
                        </div>
                    </div>
                </div>
            </div>
        </tr>
    @endforeach

    @foreach ($posts as $post)
        <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
                            <input type="hidden" name="id" value="{{ $post->id }}" >
                            <button onclick="tinyMCEwwww();" class="btn btn-danger" type="submit">حذف</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
