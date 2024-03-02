@extends('layouts.dashboard')

@section('content')
    <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{ $prog->TITLE }}</h5>
        <a class="btn btn-primary" type="button" href="/programsvid/{{ $prog->id }}/create">إضافة حلقة جديدة</a>
        <a class="btn btn-primary pt-2" type="button" href="/programseditprogram/{{ $prog->id }}">تعديل بيانات البرنامج</a>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                        <thead>
                            <tr>
                                <th>عنوان الحلقة</th>
                                <th>تاريخ الإنشاء</th>
                                <th>عدد المشاهدات للحلقة</th>
                                <th>ترتيب الحلقة</th>
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
                                    <td>{{ $video->NO }}</td>
                                    <td><a class="btn btn-primary" type="button" data-toggle="modal"
                                            data-target="#exampleModalLarge{{ $video->id }}">المزيد من المعلومات</a></td>
                                    <td><a class="btn btn-primary" type="button"
                                            href="/programsvid/{{ $video->id }}/edit">تعديل</a></td>
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
                                        <?php echo $video->TEXT; ?>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                            <a class="btn btn-primary" type="button"
                                href="/programsvid/{{ $video->id }}/edit">تعديل</a>
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
                        <p>هل تريد حذف حلقة "{{ $video->TITLE }}"</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                        <form action="/programsvid/delete/{{ $video->id }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="id" value="{{ $video->id }}">
                            <button onclick="tinyMCEwwww();" class="btn btn-danger" type="submit">حذف</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
