@extends('layouts.dashboard')

@section('content')
    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        <h5 class="hk-sec-title">إضافة برنامج جديد</h5>
        <div class="row">
            <div class="col-sm">
                <form action="/storeprograms" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tital">عنوان البرنامج</label>
                                <input id="tital" type="text"
                                    class="form-control @error('tital') is-invalid @enderror" name="tital"
                                    value="{{ old('tital') }}" autocomplete="tital" autofocus>
                                @error('tital')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>عنوان البرنامج مطلوب</strong>
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
                                        <strong>لون البرنامج مطلوب</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="NO">عدد الحلقات الكلية</label>
                                <input id="NO" type="number" class="form-control @error('NO') is-invalid @enderror"
                                    name="NO" value="{{ old('NO') }}" autocomplete="NO" autofocus>
                                @error('NO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>عدد الحلقات الكلية مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="PERSON">مقدم البرنامج إن وجد </label>
                                <input id="PERSON" type="text"
                                    class="form-control @error('PERSON') is-invalid @enderror" name="PERSON"
                                    value="{{ old('PERSON') }}" autocomplete="PERSON" autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">شرح البرنامج</label>
                        <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror"
                            name="description" autocomplete="description" autofocus>{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>شرح البرنامج مطلوب</strong>
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
                            <label for="description">صورة البرنامج</label>
                            <input value="{{ old('IMG') }}" autocomplete="IMG" type="file" id="IMG"
                                name="IMG" class="dropify @error('IMG') is-invalid @enderror" />
                        </div>
                    </div>
                    <div class="row">
                        <div style="color: red;" class="col-sm">
                            @error('IMG')
                                <strong>يجب إضافة صورة للبرنامج</strong>
                            @enderror
                        </div>
                    </div>

                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">
                                <h5 class="hk-sec-title">المقال للبرنامج</h5>
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
                                            <strong>يجب إضافة نص شرح للبرنامج</strong>
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
@endsection
