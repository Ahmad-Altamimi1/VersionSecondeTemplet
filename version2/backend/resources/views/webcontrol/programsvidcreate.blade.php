@extends('layouts.dashboard')

@section('content')
    <script type="text/javascript">
        tinyMCE.init({
            mode: "specific_textareas",
            editor_selector: "mceEditor"
        });
    </script>

    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        <h5 class="hk-sec-title">إضافة فيديو جديد ل{{ $program->TITLE }}</h5>
        <div class="row">
            <div class="col-sm">

                <form action="/storeprogramsvid" enctype="multipart/form-data" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $program->id }}" name="PROGRAM">
                    <div class="row">

                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="TITLE">عنوان الفيديو</label>
                                <input id="TITLE" type="text"
                                    class="form-control @error('TITLE') is-invalid @enderror" name="TITLE"
                                    value="{{ old('TITLE') }}" autocomplete="TITLE" autofocus>
                                @error('TITLE')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>عنوان الفيديو مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <div class="form-group">
                                <label for="NO">ترتيب الفيديو</label>
                                <select id="NO" name="NO"
                                    class="form-control  @error('NO') is-invalid @enderror select2">
                                    @php
                                        $p = 1;
                                        $OK = 0;
                                    @endphp
                                    @while ($p <= $program->NO)
                                        @php $OK=1; @endphp
                                        @foreach ($videos as $video)
                                            @if ($video->NO == $p)
                                                @php $OK=0; @endphp
                                            @endif
                                        @endforeach

                                        @if ($OK)
                                            <option value="{{ $p }}">{{ $p }}</option>
                                        @endif

                                        @php $p++; @endphp
                                    @endwhile

                                </select>
                                @error('NO')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>ترتيب الفيديو مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="VID">رابط اليوتيوب للفيديو</label>
                                <input id="VID" type="text" class="form-control @error('VID') is-invalid @enderror"
                                    name="VID" value="{{ old('VID') }}" autocomplete="VID" autofocus>
                                @error('VID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>رابط الفيديو مطلوب (يجب ان يكون رابط لليوتيوب)</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12">
                            <label for="tital">صورة الفيديو</label>
                            <input type="file" id="IMG" name="IMG" class="dropify" />
                        </div>
                        <div class="row">
                            <div style="color: red;" class="col-sm">
                                @error('IMG')
                                    <strong>يجب إضافة صورة للفيديو</strong>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-3">
                        <label for="DESCRIPTION">الوصف</label>
                        <textarea class="form-control @error('DESCRIPTION') is-invalid @enderror mt-15" rows="6" id="DESCRIPTION"
                            name="DESCRIPTION">{{ old('DESCRIPTION') }}</textarea>
                        @error('DESCRIPTION')
                            <span class="invalid-feedback" role="alert">
                                <strong>شرح الفيديو مطلوب</strong>
                            </span>
                        @enderror
                    </div>


                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">
                                <h5 class="hk-sec-title">المقال للفيديو</h5>
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
                                            <strong>يجب إضافةالمقال</strong>
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
