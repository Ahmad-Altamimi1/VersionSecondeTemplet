@extends('layouts.dashboard')

@section('content')
    <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">الفيديوهات (<?php echo count($videos); ?>)</h5>
        <a class="btn btn-primary" type="button" href="{{route('videos.create')}}">إضافة فيديو جديد</a>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                        <thead>
                            <tr>
                                <th>عنوان الفيديو</th>
                                <th>تاريخ الإنشاء</th>
                                <th>عدد المشاهدات</th>
                                <th>التصنيف</th>
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
                                        @foreach($video->group->tags as $tag)
                                        
                                        @if($tag->parentId === null)
                                            <li dir="rtl">
                                                {{ $tag->TITLE }}
                                                @if($tag->children->isNotEmpty())
                                                    @include('partial.arrows', ['children' => $tag->children],['group' => $video->group])
                                                    @else
                                                    <input type="hidden" name="tag" value="{{$tag->id}}">
                                                    
                                                    @endif
                                            </li>
                                        @endif
                                    @endforeach
                                    </td>

                                    <td><a class="btn btn-primary" type="button"
                                        href="{{ route('videos.edit', $video->id) }}">تعديل</a></td>

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
                        <form action="{{route('videos.destroy',$video->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $video->id }}">
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
