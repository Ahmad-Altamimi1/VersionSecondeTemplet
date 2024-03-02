@extends('layouts.dashboard')

@section('content')
    <section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
        <h5 class="hk-sec-title">إضافة صورة</h5>
        <div class="row">
            <div class="col-sm">
                <form action="/store_pictures" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label for="TITLE">عنوان الصورة</label>
                                <input id="TITLE" type="text"
                                    class="form-control @error('TITLE') is-invalid @enderror" name="TITLE"
                                    value="{{ old('TITLE') }}" autocomplete="TITLE" autofocus>
                                @error('TITLE')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>عنوان المعرض مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label class="control-label mb-10">وقت النشر</label>
                                <input type="datetime-local" class="form-control"
                                    @error('DATE_SCHEDULER') is-invalid @enderror" name="DATE_SCHEDULER"
                                    value="{{ old('DATE_SCHEDULER') }}" autocomplete="DATE_SCHEDULER" autofocus>
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
                                <label for="tital">تصنيف الصورة</label>
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
                                        <strong>تصنيف الصورة مطلوب</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-12">
                            <label for="tital">الصورة</label>
                            <input type="file" id="IMG" name="IMG" class="dropify" />
                        </div>
                        <div class="row">
                            <div style="color: red;" class="col-sm">
                                @error('IMG')
                                    <strong>يجب إضافة صورة <strong>
                                        @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group pt-3">
                        <label for="DESCRIPTION">وصف الصورة</label>
                        <textarea class="form-control @error('DESCRIPTION') is-invalid @enderror mt-15" rows="6" id="DESCRIPTION"
                            name="DESCRIPTION">{{ old('DESCRIPTION') }}</textarea>
                        @error('DESCRIPTION')
                            <span class="invalid-feedback" role="alert">
                                <strong>وصف الصورة مطلوب</strong>
                            </span>
                        @enderror
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
@endsection
