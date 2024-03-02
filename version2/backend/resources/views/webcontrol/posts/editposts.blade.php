@extends('layouts.dashboard')

@section('content')
    <script type="text/javascript">
        tinyMCE.init({
            mode: "specific_textareas",
            editor_selector: "mceEditor"
        });
    </script>

    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        <h5 class="hk-sec-title">تعديل {{ $post->TITLE }}</h5>
        <div class="row">
            <div class="col-sm">
                <form action="/posts/{{ $post->id }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="TITLE">عنوان المقال</label>
                                <input id="TITLE" type="text"
                                    class="form-control @error('TITLE') is-invalid @enderror" name="TITLE"
                                    value="{{ $post->TITLE }}" autocomplete="TITLE" autofocus>
                                @error('TITLE')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>عنوان المقال مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="control-label mb-10">وقت النشر</label>
                                <input type="datetime-local"
                                    class="form-control @error('DATE_SCHEDULER') is-invalid @enderror" name="DATE_SCHEDULER"
                                    value="{{ $post->DATE_SCHEDULER }}" autocomplete="DATE_SCHEDULER" autofocus>
                                @error('DATE_SCHEDULER')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>وقت النشر على الموقع مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="text-right row">
                        <div class="text-right col-md-12 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="TOPIC">تصنيف المقال</label>
                                <select id="TOPIC" name="TOPIC"
                                    class="form-control  @error('TOPIC') is-invalid @enderror select2">
                                    <option value="" selected></option>
                                    @foreach ($groups as $group)
                                    @php

                                    $lastGroupsTag = \App\Models\GroupsTag::where('groupId', '=', $group->id)->get()->last()->tagId;
                                @endphp
                                    <option @if ($group->id == $post->groupId) {{ 'selected' }} @endif
                                        value="{{ $group->id . ",".$lastGroupsTag }}">
    
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
                            <p for="tital">صورة المقال (ان لم تقم برفع صورة جديدة سيتم عرض الصورة القديمة)</p>
                            <img style="max-height: 200px; text-align: center;"
                                src="{{ asset($post->Main_IMG ) }}" alt="">
                            <input type="file" id="IMG" name="IMG" class="dropify" />
                            <div class="row">
                                <div style="color: red;" class="col-sm">
                                    @error('IMG')
                                        <strong>يجب إضافة صورة للبوست</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <div class="form-group pt-3">
                                <label for="DESCRIPTION">وصف للصورة</label>
                                <input id="PIC_Name" type="text"
                                    class="form-control @error('PIC_Name') is-invalid @enderror" name="PIC_Name"
                                    value="{{ $post->PIC_Name }}" autocomplete="PIC_Name" autofocus>
                                @error('PIC_Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>وصف للصورة مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group pt-3">
                        <label for="DESCRIPTION">الوصف</label>
                        <textarea class="form-control @error('DESCRIPTION') is-invalid @enderror" mt-15" rows="6" id="DESCRIPTION"
                            name="DESCRIPTION">{{ $post->DESCRIPTION }}</textarea>
                        @error('DESCRIPTION')
                            <span class="invalid-feedback" role="alert">
                                <strong>شرح المقال مطلوب</strong>
                            </span>
                        @enderror
                    </div>


                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">
                                <h5 class="hk-sec-title">المقال</h5>
                                </p>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="tinymce-wrap">
                                            <textarea id="editor" name="TEXT"><?php echo $post->TEXT1; ?></textarea>
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
                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-12">
                            <section class="hk-sec-wrapper">
                                <h5 class="hk-sec-title">المراجع</h5>
                                </p>
                                <div class="row">
                                    <div class="col-sm">
                                        <div class="tinymce-wrap">
                                            <textarea id="REFERENCES" name="REFERENCES"><?php echo $post->REFERENCES; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div style="color: red;" class="col-sm">
                                        @error('TEXT')
                                            <strong>يجب إضافة مرجع</strong>
                                        @enderror
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>


                    <div class="row pt-4">
                        <div class="col-sm">

                            <button class="btn btn-primary" type="submit">تعديل</button>
                            <a style="color: white" type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{ $post->id }}">حذف</a>
                        </div>

                    </div>


                </form>

            </div>
        </div>
    </section>

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
                    <p>هل تريد حذف بوست "{{ $post->TITLE }}"</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                    <form action="/posts/delete/{{ $post->id }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <button onclick="tinyMCEwwww();" class="btn btn-danger" type="submit">حذف</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

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


        let REFERENCES;
        ClassicEditor
            .create(document.querySelector('#REFERENCES'), {
                language: {
                    // The UI will be English.
                    ui: 'en',

                    // But the content will be edited in Arabic.
                    content: 'ar'
                }
            })
            .then(REFERENCES => {
                window.editor = REFERENCES;
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

        document.querySelector('form').addEventListener('submit', function(event) {
            // Get CKEditor instance and its content
            const editor = ClassicEditor.instances.editor;
            const editorContent22 = REFERENCES.getData();

            // Set the CKEditor content as the value of the hidden input field
            document.querySelector('#REFERENCES').value = editorContent22;
        });
    </script>
@endsection
