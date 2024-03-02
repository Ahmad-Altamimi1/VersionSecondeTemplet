@extends('layouts.dashboard')

@section('content')
    <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">الصور (<?php echo count($pictures); ?>)</h5>
        <a class="btn btn-primary" type="button" href="/posts/addpictures">إضافة صورة جديدة</a>
        <!-- search.blade.php -->
        <div class="row pt-5">
            <div class="col-sm">
                <form action="{{ route('search-pictures') }}" method="GET">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-light" type="submit">بحث</button>
                            </div>
                            <input style="text-align: right;" type="text" name="q" class="form-control"
                                placeholder="البحث في جميع الموقع" aria-label="" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                        <thead>
                            <tr>
                                <th>عنوان الصورة</th>
                                <th>تاريخ الإنشاء</th>
                                <th>تاريخ النشر على الموقع</th>
                                <th>عدد المشاهدات</th>
                                <th>التصنيف</th>
                                <th>نسخ رابط الصورة</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (array_slice($pictures->toArray(), 0, 100) as $picture)
                                <tr>
                                    <td>{{ $picture->TITLE }}</td>
                                    <td>{{ $picture->DATE }}</td>
                                    <td>{{ $picture->DATE_SCHEDULER }}</td>
                                    <td>{{ $picture->REED }}</td>
                                    <td>
                                        @foreach ($groups as $group)
                                            @if ($picture->TOPIC == $group->id)
                                                <?php
                                                $string = $group->TAG;
                                                $str_arr = explode(',', $string);
                                                ?>
                                                @foreach ($str_arr as $stag)
                                                    @foreach ($poststags as $singletag)
                                                        @if ($stag == $singletag->id)
                                                            {{ $singletag->TITLE . '>' }}
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </td>
                                    <td> <button class="btn btn-primary"
                                            onclick="myFunction('{{ asset('storage/' . $picture->IMG1 . '') }}')">نسخ الرابط</button></td>

                                    <td><a class="btn btn-primary" type="button"
                                            href="/posts/pictures/{{ $picture->id }}/edit">تعديل</a></td>
                                    <td><a type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#exampleModal{{ $picture->id }}">حذف</a></td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>



    @foreach ($pictures as $picture)
        <div class="modal fade" id="exampleModal{{ $picture->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ $picture->TITLE }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>هل تريد حذف بوست "{{ $picture->TITLE }}"</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                        <form action="/pictures/delete/{{ $picture->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $picture->id }}">
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach



    <script>
        function myFunction(url) {
            // Get the text field
            var copyText = url;
            // Copy the text inside the text field
            navigator.clipboard.writeText(url);

            // Alert the copied text
            alert("Copied the text: " + url);
        }
    </script>
@endsection
