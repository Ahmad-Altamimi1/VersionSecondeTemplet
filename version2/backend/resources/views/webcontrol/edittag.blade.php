@extends('layouts.dashboard')

@section('content')
    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        <h5 class="hk-sec-title">تعديل {{ $poststag->TITLE }}</h5>
        <div class="row">
            <div class="col-sm">

                <form action="{{route('tags.update',$poststag->id)}}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="tital">عنوان التصنيف</label>
                                <input id="tital" type="text"
                                    class="form-control @error('tital') is-invalid @enderror" name="tital"
                                    value="{{ $poststag->TITLE }}" autocomplete="tital" autofocus>
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
                                    value="{{ $poststag->COLOR }}" autocomplete="COLOR" autofocus>
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
                            name="description" autocomplete="description" autofocus>{{ $poststag->DESCRIPTION }}</textarea>
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
                                    value="{{ $poststag->FACEBOOK }}" autocomplete="FACEBOOK" autofocus>
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
                                    value="{{ $poststag->YOUTUBE }}" autocomplete="YOUTUBE" autofocus>
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
                                    value="{{ $poststag->TWITTER }}" autocomplete="TWITTER" autofocus>
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
                                    value="{{ $poststag->INSTAGRAM }}" autocomplete="INSTAGRAM" autofocus>
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
                            <p for="description">صورة للتصنيف (ان لم تقم برفع صورة جديدة سيتم عرض الصورة
                                القديمة)</p>
                            <img style="max-height: 200px; text-align: center;"
                                src="{{ asset($poststag->IMG ) }}" alt="">
                            <input type="file" id="IMG" name="IMG" class="dropify" />
                        </div>
                    </div>
                    <div class="row">
                        <div style="color: red;" class="col-sm">
                            @error('IMG')
                                <strong>يجب ان يكون الملف صورة </strong>
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
                                            <div id="summernote"><?php echo $poststag->TEXT; ?></div>
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
