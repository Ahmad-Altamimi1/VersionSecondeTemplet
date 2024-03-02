@extends('layouts.dashboard')

@section('content')
    <script type="text/javascript">
        tinyMCE.init({
            mode: "specific_textareas",
            editor_selector: "mceEditor"
        });
    </script>

    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        <h5 class="hk-sec-title">إضافة فيديو جديد</h5>
        <div class="row">
            <div class="col-sm">
   
                <form action="{{ route('videos.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
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
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="control-label mb-10">وقت النشر</label>
                                <?php
                                    $defaultTime = now()->addHours(3)->format('Y-m-d\TH:i');
                                ?>
                                <input type="datetime-local" class="form-control @error('DATE_SCHEDULER') is-invalid @enderror" name="DATE_SCHEDULER" value="{{ old('DATE_SCHEDULER') ?: $defaultTime }}" autocomplete="DATE_SCHEDULER" autofocus>
                                @error('DATE_SCHEDULER')
                                <span class="invalid-feedback" role="alert">
                                    <strong>وقت النشر على الموقع مطلوب</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="VID">رابط اليوتيوب للفيديو</label>
                                <input id="VID" type="text"
                                    class="form-control @error('VID') is-invalid @enderror" name="VID"
                                    value="{{ old('VID') }}" autocomplete="VID" autofocus>
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
                            <div class="form-group">
                                <label for="tital">تصنيف المقال</label>
                                <select id="TOPIC" name="TOPIC"
                                    class="form-control  @error('TOPIC') is-invalid @enderror select2">
                                    <option value="" selected></option>
                                    @foreach ($groups as $group)
                                    @php

                                    $lastGroupsTag = \App\Models\GroupsTag::where('groupId', '=', $group->id)->get()->last()->tagId;
                                @endphp
                                    <option  value="{{ $group->id . ",".$lastGroupsTag }}">

                                        @foreach($group->tags as $tag)
                                        @if($tag->parentId === null)
                                      
                                            <li dir="ltr" id="tagssequnce">
                                          
                                               {{ $tag->TITLE }}
@if ($group->tags->contains('id', $tag->id))
                                                
                                                @if($tag->children->isNotEmpty())
                                                    @include('partial.arrows', ['children' => $tag->children])
                                                    
                                                    @endif
                                                    @endif
                                            </li>
                                        @endif
                                        @endforeach 
                                    </option>
                                    @endforeach
                                </select>
                                @error('TOPIC')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>تصنيف المقال مطلوب</strong>
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
                                            <textarea id="editor" name="TEXT">{{ old('TEXT') }}</textarea>
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
                            <button class="btn btn-primary" type="submit">إضافة</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </section>
    <script>
        let editor;
        ClassicEditor
            .create(document.querySelector('#editor'), {
                language: {
                    // The UI will be English.
                    ui: 'en',

                    // But the content will be edited in Arabic.
                    content: 'ar'
                }
            })
            .then(editor => {
                window.editor = editor;
            })
            .catch(err => {
                console.error(err.stack);
            });

        document.querySelector('form').addEventListener('submit', function(event) {
            // Get CKEditor instance and its content
            const editor = ClassicEditor.instances.editor;
            const editorContent = editor.getData();

            // Set the CKEditor content as the value of the hidden input field
            document.querySelector('#TEXT').value = editorContent;
        });
    </script>

@endsection
