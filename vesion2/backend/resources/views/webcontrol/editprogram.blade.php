@extends('layouts.dashboard')

@section('content')
    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        <h5 class="hk-sec-title">تعديل {{ $program->TITLE }}</h5>
        <div class="row">
            <div class="col-sm">
                <form action="/program/{{ $program->id }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="TITLE">عنوان البرنامج</label>
                                <input id="TITLE" type="text"
                                    class="form-control @error('TITLE') is-invalid @enderror" name="TITLE"
                                    value="{{ $program->TITLE }}" autocomplete="TITLE" autofocus>
                                @error('TITLE')
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
                                    value="{{ $program->COLOR }}" autocomplete="COLOR" autofocus>
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
                                    name="NO" value="{{ $program->NO }}" autocomplete="NO" autofocus>
                                @error('NO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>عدد الحلقات يجب ان يكون اكثر من العدد الأكبر من ترتيب الحلقات</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="PERSON">مقدم البرنامج إن وجد </label>
                                <input id="PERSON" type="text"
                                    class="form-control @error('PERSON') is-invalid @enderror" name="PERSON"
                                    value="{{ $program->PERSON }}" autocomplete="PERSON" autofocus>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="DESCRIPTION">شرح البرنامج</label>
                        <textarea id="DESCRIPTION" type="text" class="form-control @error('DESCRIPTION') is-invalid @enderror"
                            name="DESCRIPTION" autocomplete="DESCRIPTION" autofocus>{{ $program->DESCRIPTION }}</textarea>
                        @error('DESCRIPTION')
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
                                    value="{{ $program->FACEBOOK }}" autocomplete="FACEBOOK" autofocus>
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
                                    value="{{ $program->YOUTUBE }}" autocomplete="YOUTUBE" autofocus>
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
                                    value="{{ $program->TWITTER }}" autocomplete="TWITTER" autofocus>
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
                                    value="{{ $program->INSTAGRAM }}" autocomplete="INSTAGRAM" autofocus>
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
                            <p for="tital">صورة المقال (ان لم تقم برفع صورة جديدة سيتم عرض الصورة القديمة)</p>
                            <img style="max-height: 200px; text-align: center;"
                                src="{{ asset('storage/' . $program->IMG . '') }}" alt="">
                            <input type="file" id="IMG" name="IMG" class="dropify" />
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
                                            <div id="summernote"><?php echo $program->TEXT; ?></div>
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
                            <button onclick="tinyMCEwwww();" class="btn btn-primary" type="submit">تعديل</button>
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
