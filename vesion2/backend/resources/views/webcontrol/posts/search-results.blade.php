@extends('layouts.dashboard')

@section('content')
    <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">المقالات والأخبار (<?php echo count($posts); ?>)</h5>
        <h5>نتائج البحث عن "{{ $searchQuery }}"</h5>

        <a class="btn btn-primary" type="button" href="/posts/create">إضافة مقال جديد</a>
        <!-- search.blade.php -->
        <div class="row pt-5">
            <div class="col-sm">
                <form action="{{ route('search-posts') }}" method="GET">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-light" type="submit">بحث</button>
                            </div>
                            <input style="text-align: right;" type="text" name="q" class="form-control" placeholder="البحث في جميع الموقع" aria-label="" aria-describedby="basic-addon1">
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
                            @foreach ($filteredPosts->take(100) as $post)
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
    </section>



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
