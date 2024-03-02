@extends('layouts.dashboard')

@section('content')
<section style="text-align: right; " class="hk-sec-wrapper">
    <h5 class="hk-sec-title">التصنيفات</h5>
    <p>يمكنك حذف الموضوع فقط ان كان لا يوجد هنالك اي مقال او فيديو مرتبط به</p>
    <a class="btn btn-primary" type="button" href="{{route('tags.create')}}">إضافة تصنيف جديد</a>
    <div class="row">
        <div class="col-sm">
            <div class="table-wrap">
                <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                    <thead>
                        <tr>
                            <th>عنوان التصنيف</th>
                            <th>ID</th>
                            <th>تاريخ الإنشاء</th>
                            <th>عدد المقالات</th>
                            <th>عدد المشاهدات</th>
                            <th>المزيد من المعلومات</th>
                            <th>تعديل</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($poststags as $tag)
                        <tr>
                            <td>{{ $tag->TITLE }}</td>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->DATE }}</td>
                            <td>
                          {{count($tag->posts)}}
                            <td>
                                {{ $tag->REED }}
                            </td>
                            <td><a class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModalLarge{{ $tag->id }}">المزيد من المعلومات</a></td>
                            <td><a class="btn btn-primary" type="button" href="/tags/{{ $tag->id }}/edit">تعديل</a></td>

                            {{-- @if ($num == 0) --}}
                            <td><a type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $tag->id }}">حذف</a></td>
                            {{-- @endif --}}


                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@foreach ($poststags as $poststag)
<tr>
    <!-- Modal -->
    <div class="modal fade" id="exampleModalLarge{{ $poststag->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLarge{{ $poststag->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $poststag->TITLE }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>

                        <div style="text-align: right;" class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label style="text-align: right;" for="tital">عنوان التصنيف</label>
                                    <input readonly id="tital" type="text" class="form-control @error('tital') is-invalid @enderror" name="tital" value="{{ $poststag->TITLE }}" autocomplete="tital" autofocus>
                                    @error('tital')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>عنوان التصنيف مطلوب</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label style="text-align: right;" for="COLOR">اللون</label>
                                    <input style="background-color: #{{ $poststag->COLOR }}" readonly id="COLOR" type="text" class="form-control @error('COLOR') is-invalid @enderror" name="COLOR" value="{{ $poststag->COLOR }}" autocomplete="COLOR" autofocus>

                                </div>
                            </div>
                        </div>


                        <div style="text-align: right;" class="form-group">
                            <label for="description">شرح التصنيف</label>
                            <textarea style="text-align: right;" readonly id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus>{{ $poststag->DESCRIPTION }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>شرح التصنيف مطلوب</strong>
                            </span>
                            @enderror
                        </div>
                        <div style="text-align: right;" class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label style="text-align: right;" for="FACEBOOK">الفيسبوك</label>
                                    <input readonly id="FACEBOOK" type="text" class="form-control" name="FACEBOOK" value="{{ $poststag->FACEBOOK }}" autocomplete="FACEBOOK" autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label style="text-align: right;" for="YOUTUBE">اليوتيوب</label>
                                    <input readonly id="YOUTUBE" type="text" class="form-control" name="YOUTUBE" value="{{ $poststag->YOUTUBE }}" autocomplete="YOUTUBE" autofocus>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label style="text-align: right;" for="TWITTER">تويتر</label>
                                    <input readonly id="TWITTER" type="text" class="form-control" name="TWITTER" value="{{ $poststag->TWITTER }}" autocomplete="TWITTER" autofocus>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label style="text-align: right;" for="INSTAGRAM">انستقرام</label>
                                    <input readonly id="INSTAGRAM" type="text" class="form-control" name="INSTAGRAM" value="{{ $poststag->INSTAGRAM }}" autocomplete="INSTAGRAM" autofocus>
                                </div>
                            </div>
                        </div>
                        <div style="text-align: center;" class="row">
                            <div class="col-sm">
                                <p style="text-align: right;" for="description">صورة للتصنيف</p>
                                <img style="max-height: 200px;" src="{{ asset('storage/' . $poststag->IMG . '') }}" alt="">
                            </div>
                        </div>

                        <!-- Row -->
                        <div class="row">
                            <div class="col-xl-12">
                                <?php echo $poststag->TEXT; ?>
                            </div>
                        </div>
                        <!-- /Row -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                    <a class="btn btn-primary" type="button" href="/posts/tags/{{ $poststag->id }}/edit">تعديل</a>
                </div>
            </div>
        </div>
    </div>
</tr>
@endforeach

@foreach ($poststags as $post)
<div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{route('tags.destroy',$post->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    <button onclick="tinyMCEwwww();" class="btn btn-danger" type="submit">حذف</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
