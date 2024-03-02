@extends('layouts.dashboard')

@section('content')
    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        <h5 class="hk-sec-title">إضافة تصنيف جديد</h5>
        <div class="row">
            <div class="col-sm">
                <form action="{{route('tags.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tital">عنوان التصنيف</label>
                                <input id="tital" type="text"
                                    class="form-control @error('tital') is-invalid @enderror" name="tital"
                                    value="{{ old('tital') }}" autocomplete="tital" autofocus>
                                @error('tital')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>عنوان التصنيف مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="COLOR">اللون(دون استخدام رمز #) <a href="{{ url('/color') }}" target="_blank"
                                        rel="noopener noreferrer">رموز الألوان</a></label>
                                <input id="COLOR" type="text"
                                    class="form-control @error('COLOR') is-invalid @enderror" name="COLOR"
                                    value="{{ old('COLOR') }}" autocomplete="COLOR" autofocus>
                                @error('COLOR')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>لون التصنيف مطلوب</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="description">شرح التصنيف</label>
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                            name="description" autocomplete="description" autofocus>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>شرح التصنيف مطلوب</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="FACEBOOK">الفيسبوك</label>
                                <input id="FACEBOOK" type="text"
                                    class="form-control @error('FACEBOOK') is-invalid @enderror" name="FACEBOOK"
                                    value="{{ old('FACEBOOK') }}" autocomplete="FACEBOOK" autofocus>
                                @error('FACEBOOK')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>رابط الفيسبوك مطلوب (ان لم يتواجد فقم بإضافة رابط الموقع للفيسبوك)</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="YOUTUBE">اليوتيوب</label>
                                <input id="YOUTUBE" type="text"
                                    class="form-control @error('YOUTUBE') is-invalid @enderror" name="YOUTUBE"
                                    value="{{ old('YOUTUBE') }}" autocomplete="YOUTUBE" autofocus>
                                @error('YOUTUBE')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>رابط اليوتيوب مطلوب (ان لم يتواجد فقم بإضافة رابط الموقع لليوتيوب)</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="TWITTER">تويتر</label>
                                <input id="TWITTER" type="text"
                                    class="form-control @error('TWITTER') is-invalid @enderror" name="TWITTER"
                                    value="{{ old('TWITTER') }}" autocomplete="TWITTER" autofocus>
                                @error('TWITTER')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>رابط تويتر مطلوب (ان لم يتواجد فقم بإضافة رابط الموقع للتويتر)</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="INSTAGRAM">انستقرام</label>
                                <input id="INSTAGRAM" type="text"
                                    class="form-control @error('INSTAGRAM') is-invalid @enderror" name="INSTAGRAM"
                                    value="{{ old('INSTAGRAM') }}" autocomplete="INSTAGRAM" autofocus>
                                @error('INSTAGRAM')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>رابط انستقرام مطلوب (ان لم يتواجد فقم بإضافة رابط الموقع للانستقرام)</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label for="description">صورة للتصنيف</label>
                            <input autocomplete="IMG" type="file" id="IMG" name="IMG" class="dropify @error('IMG') is-invalid @enderror" />

                        </div>
                    </div>
                    <div class="row">
                        <div style="color: red;" class="col-sm">
                            @error('IMG')
                                <strong>يجب إضافة صورة للتصنيف</strong>
                            @enderror
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">
                                <h5 class="hk-sec-title">المقال للتصنيف</h5>
                                </p>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="tinymce-wrap">
                                            <div id="summernote"><?php echo old('TEXT'); ?></div>
                                            <input type="hidden" id="TEXT" name="TEXT">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div style="color: red;" class="col-sm">
                                        @error('TEXT')
                                            <strong>يجب إضافة نص شرح للتصنيف</strong>
                                        @enderror
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- /Row -->


                    <div class="row pt-4">
                        <div class="col-sm">
                            <button onclick="tinyMCEwwww();" class="btn btn-primary" type="submit">إضافة</button>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </section>

    <script>
        function tinyMCEwwww() {
            var mysave = $('#editor1').html();
            // alert(mysave);
            $('#TEXT').val(mysave);
        }
    </script>

    <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">التصنيفات</h5>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                        <thead>
                            <tr>
                                <th>عنوان التصنيف</th>
                                <th>تاريخ الإنشاء</th>
                                <th>شرح التصنيف</th>
                                <th>المزيد من المعلومات</th>
                                <th>تعديل</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $poststag)
                                <tr>
                                    <td>{{ $poststag->TITLE }}</td>
                                    <td>{{ $poststag->DATE }}</td>
                                    <td>{{ $poststag->DESCRIPTION }}</td>
                                    <td><a class="btn btn-primary" type="button" data-toggle="modal"
                                            data-target="#exampleModal{{ $poststag->id }}">المزيد من المعلومات</a></td>
                                    <td><a class="btn btn-primary" type="button"
                                            href="/posts/tags/{{ $poststag->id }}/edit">تعديل</a></td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @foreach ($tags as $poststag)
        <tr>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $poststag->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $poststag->TITLE }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <table style="direction: rtl; text-align: right;" id="datable_5"
                                class="table table-hover w-100 display">
                                <tbody>

                                    <tr>
                                        <td>
                                            <p>اسم التصنيف</p>
                                        </td>
                                        <td>{{ $poststag->TITLE }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>تاريخ الإنشاء</p>
                                        </td>
                                        <td>{{ $poststag->DATE }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>تاريخ التعديل</p>
                                        </td>
                                        <td>{{ $poststag->LASTDATE }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>المؤلف</p>
                                        </td>
                                        <td>
                                            @foreach ($users as $user)
                                                @if ($user->id == $poststag->WRITER)
                                                    {{ $user->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>المُعدل</p>
                                        </td>
                                        <td>
                                            @foreach ($users as $user)
                                                @if ($user->id == $poststag->EDITOR)
                                                    {{ $user->name }}
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p>الوصف</p>
                                        </td>
                                        <td>{{ $poststag->DESCRIPTION }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                            <a class="btn btn-primary" type="button"
                                href="/posts/tags/{{ $poststag->id }}/edit">تعديل</a>
                        </div>
                    </div>
                </div>
            </div>
        </tr>
    @endforeach
@endsection
