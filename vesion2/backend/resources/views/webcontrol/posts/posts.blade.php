@extends('layouts.dashboard')

@section('content')
    <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">المقالات والأخبار (<?php echo count($posts); ?>)</h5>
        <a class="btn btn-primary" type="button" href="/posts/create">إضافة مقال جديد</a>
        <!-- search.blade.php -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>


        <div class="row">
            <div class="col-sm">
                <div class="">
                    <table style="direction: rtl;" id="myTable" class="table table-hover w-100 display">
                        <thead>
                            <tr>

                                <th> ID</th>
                                <th>عنوان المقال</th>
                                <th>تاريخ الإنشاء</th>
                                <th>تاريخ النشر على الموقع</th>
                                <th>عدد المشاهدات</th>
                                <th>التصنيف</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->TITLE }}</td>
                                    <td>{{ $post->DATE }}</td>
                                    <td>{{ $post->DATE_SCHEDULER }}</td>
                                    <td>{{ $post->REED }}</td>
                                    <td>
                                        @foreach($post->group->tags as $tag)

                                        @if($tag->parentId === null)
                                            <li dir="rtl">
                                                {{ $tag->TITLE }}
                                                @if($tag->children->isNotEmpty())
                                                    @include('partial.arrows', ['children' => $tag->children],['group' => $post->group])
                                                    @else
                                                    <input type="hidden" name="tag" value="{{$tag->id}}">
                                                    @endif
                                            </li>
                                        @endif
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
                        <form action="{{ route('posts.destroy', $post) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('DELETE')
                            {{-- <input type="hidden" name="id" value="{{ $post }}"> --}}
                            <button onclick="tinyMCEwwww();" class="btn btn-danger" type="submit">حذف</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        $(document).ready( function () {
    $('#myTable').DataTable({
        "order": [[0, 'desc']]
    });
} );
    </script>
@endsection
