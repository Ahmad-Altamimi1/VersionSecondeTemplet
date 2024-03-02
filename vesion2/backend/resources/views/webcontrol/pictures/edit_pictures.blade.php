@extends('layouts.dashboard')

@section('content')
    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        <h5 class="hk-sec-title">تعديل {{ $picture->TITLE }}</h5>
        <div class="row">
            <div class="col-sm">
                <form action="/pictures/{{ $picture->id }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="TITLE">عنوان الصورة</label>
                                <input id="TITLE" type="text"
                                    class="form-control @error('TITLE') is-invalid @enderror" name="TITLE"
                                    value="{{ $picture->TITLE }}" autocomplete="TITLE" autofocus>
                                @error('TITLE')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>عنوان الصورة مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="control-label mb-10">وقت النشر</label>
                                <input type="datetime-local"
                                    class="form-control @error('DATE_SCHEDULER') is-invalid @enderror" name="DATE_SCHEDULER"
                                    value="{{ $picture->DATE_SCHEDULER }}" autocomplete="DATE_SCHEDULER" autofocus>
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
                                <label for="TOPIC">تصنيف الصورة</label>
                                <select id="TOPIC" name="TOPIC"
                                class="form-control  @error('TOPIC') is-invalid @enderror select2">
                                <option value="" selected></option>
                                @foreach ($groups as $group)
                                @php

                                $lastGroupsTag = \App\Models\GroupsTag::where('groupId', '=', $group->id)->get()->last()->tagId;
                            @endphp
                                <option @if ($group->id == $video->groupId) {{ 'selected' }} @endif
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
                                        <strong>تصنيف الصورة مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-12">
                            <p for="tital">الصورة (ان لم تقم برفع صورة جديدة سيتم عرض الصورة القديمة)</p>
                            <img style="max-height: 200px; text-align: center;"
                                src="{{ asset('storage/' . $picture->IMG1 . '') }}" alt="">
                            <input type="file" id="IMG1" name="IMG1" class="dropify" />
                            <div class="row">
                                <div style="color: red;" class="col-sm">
                                    @error('IMG')
                                        <strong>يجب إضافة الصورة</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group pt-3">
                        <label for="DESCRIPTION">الوصف</label>
                        <textarea class="form-control @error('DESCRIPTION') is-invalid @enderror mt-15" rows="6" id="DESCRIPTION"
                            name="DESCRIPTION">{{ $picture->DESCRIPTION }}</textarea>
                        @error('DESCRIPTION')
                            <span class="invalid-feedback" role="alert">
                                <strong>شرح المقال مطلوب</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="row pt-4">
                        <div class="col-sm">

                            <button class="btn btn-primary" type="submit">تعديل</button>
                            <a style="color: white" type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{ $picture->id }}">حذف</a>
                        </div>

                    </div>


                </form>

            </div>
        </div>
    </section>

    <div class="modal fade" id="exampleModal{{ $picture->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $picture->TITLE }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>هل تريد حذف صورة "{{ $picture->TITLE }}"</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
                    <form action="/pictures/delete/{{ $picture->id }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="id" value="{{ $picture->id }}">
                        <button class="btn btn-danger" type="submit">حذف</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
