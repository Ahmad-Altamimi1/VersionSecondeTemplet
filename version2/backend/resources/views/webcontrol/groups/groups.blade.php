@extends('layouts.dashboard')

@section('content')
    <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">المجموعات</h5>
        <p>يمكنك حذف المجموعة فقط ان كان لا يوجد هنالك اي مقال او فيديو مرتبط به</p>
        <a class="btn btn-primary" type="button" href="{{route('groups.create')}}">إضافة مجموعة جديد</a>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                        <thead>
                            <tr>
                                <th>عنوان المجموعة</th>
                                <th>ID</th>
                                <th>تاريخ الإنشاء</th>
                                <th>عدد المشاهدات</th>
                                <th>ترتيب المجموعة</th>
                                <th>عدد المواضيع</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $group)
                                <tr>
                                    <td>{{ $group->TITLE }}</td>
                                    <td>{{ $group->id }}</td>
                                    <td>{{ $group->DATE }}</td>
                                    <td>{{ $group->REED }}</td>
                                    <td>
                                        
{{-- @dd($group->tags) --}}

                                        @foreach($group->tags as $tag)
                                        
                                        @if($tag->parentId === null)
                                            <span dir="ltr">
                                                {{ $tag->TITLE }}
@if ($group->tags->contains('id', $tag->id))

                                                @if($tag->children->isNotEmpty() )
                                                    @include('partial.arrows', ['children' => $tag->children])
                                                @else
                                                <input type="hidden" name="tag" value="{{$tag->id}}">
                                                
                                                @endif
                                                @endif
                                            </span>
                                        @endif
                                    @endforeach 

                                    </td>
                                    <td>
                                     {{count($group->posts)}}
                                    </td>
                                    <td><a class="btn btn-primary" type="button"
                                            href="/groups/{{ $group->id }}/edit">تعديل</a></td>

                                    @if (count($group->posts) == 0)
                                        <td><a type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#exampleModal{{ $group->id }}">حذف</a></td>
                                    @endif
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    @foreach ($groups as $post)
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
                        <p>هل تريد حذف عنوان "{{ $post->TITLE }}"</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                        <form action="{{route('groups.destroy',$post->id)}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
