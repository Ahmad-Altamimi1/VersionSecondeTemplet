@extends('layouts.dashboard')

@section('content')
    <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">البرامج</h5>
        <a class="btn btn-primary" type="button" href="/programs/create">إضافة برنامج جديد</a>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                        <thead>
                            <tr>
                                <th>عنوان البرنامج</th>
                                <th>تاريخ الإنشاء</th>
                                <th>عدد المشاهدات للحلقات</th>
                                <th>عدد الحلقات</th>
                                <th>مشاهدة البرنامج</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $program)
                                @php $num=0; @endphp
                                @foreach ($videos as $video)
                                    @if ($video->PROGRAM == $program->id)
                                        @php $num++; @endphp
                                    @endif
                                @endforeach

                                <td>{{ $program->TITLE }}</td>
                                <td>{{ $program->DATE }}</td>
                                <td>{{ $num }}</td>
                                <td>{{ $program->REED }}</td>
                                <td><a class="btn btn-primary" type="button"
                                        href="/programs/{{ $program->id }}/edit">تعديل</a></td>
                                <td><a type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#exampleModal{{ $program->id }}">حذف</a></td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


    @foreach ($programs as $program)
        @php $OKK=0; @endphp
        @foreach ($videos as $video)
            @if ($video->PROGRAM == $program->id)
                @php $OKK=1; @endphp
            @endif
        @endforeach
        @if ($OKK)
            <div class="modal fade" id="exampleModal{{ $program->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $program->TITLE }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>يجب حذف جميع حلقات برنامج  "{{ $program->TITLE }}"</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>

                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="modal fade" id="exampleModal{{ $program->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $program->TITLE }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>هل تريد حذف برنامج "{{ $program->TITLE }}"</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                            <form action="/programs/delete/{{ $program->id }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="id" value="{{ $program->id }}">
                                <button onclick="tinyMCEwwww();" class="btn btn-danger" type="submit">حذف</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endsection
