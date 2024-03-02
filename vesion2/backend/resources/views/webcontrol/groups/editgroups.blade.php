@extends('layouts.dashboard')

@section('content')
@php
use App\Models\GroupsTag;
    
@endphp

<section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
    <h5 class="hk-sec-title">إضافة مجموعة جديد</h5>
    <p>ترتيب التصنيفات في المجموعة حسب الترتيب الذي تختاره</p>

    <div class="row">
        <div class="col-sm">
            <form action="{{route('groups.update',$group->id)}}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="CHECK" value="1">

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="tital">عنوان المجموعة</label>
                            <input id="tital" type="text" class="form-control @error('tital') is-invalid @enderror" name="tital" value="@if (old('CHECK') == '1') {{ old('tital') }} @else {{ $group->TITLE }} @endif" autocomplete="tital" autofocus>
                            @error('tital')
                            <span class="invalid-feedback" role="alert">
                                <strong>عنوان المجموعة مطلوب</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="description">شرح التصنيف</label>
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" autofocus> @if (old('CHECK') == '1')
{{ old('description') }}
@else
{{ $group->DESCRIPTION }}
@endif </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>شرح المجموعة مطلوب</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row" id="dropdownContainer">
                    <?php
                        // $string = $group->TAG;
                        // $str_arr = explode(',', $string);
                        // $str_arr = array_filter($str_arr);
                        // // dd($str_arr);
                        // $ok = 1;
                        $tags_ingroup=$group->tags;
                       

                        ?>
                        {{-- @dd((GroupsTag::where('groupId','=',$group->id)->get())[0]->tagId); --}}

                        {{-- @dd($tags_ingroup) --}}

                    @for ($i = 1; $i <= 10; $i++) <div class="col-12">
                        <div class="form-group">
                            <div class="text-right stage-group">
                                <label>التصنيف رقم {{ $i }}</label>
                                <select id="TOPIC{{ $i }}" name="TOPIC{{ $i }}" class="text-right stage-select select2 dynamic-dropdown @error('TOPIC{{ $i }}') is-invalid @enderror">
                                    <option value=""></option>
                                    @foreach ($tags as $tag)
                                    @php
                                    $selected = '';
                                    
                    if (isset((GroupsTag::where('groupId','=',$group->id)->get())[$i-1])) {
                                    if (((GroupsTag::where('groupId','=',$group->id)->get())[$i-1]->tagId)==$tag->id) {
                                    $selected = 'selected';
                                    }
                    }
                                  
                                    @endphp

                                    <option value="{{ $tag->id }}" {{ $selected }}>
                                        {{ $tag->TITLE }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                <?php $ok = 1; ?>
                @endfor
        </div>


        <div class="row pt-4">
            <div class="col-sm">
                <button class="btn btn-primary" type="submit">تعديل</button>
            </div>
        </div>




        </form>

    </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        // Initialize the first dropdown
        updateDropdownOptions(1);

        // Event handler for dynamic dropdowns
        $(document).on('change', '.dynamic-dropdown', function() {
            // Get the current dropdown number
            const currentDropdown = parseInt($(this).attr('id').match(/\d+/)[0]);

            // Update the options for the next dropdown
            updateDropdownOptions(currentDropdown + 1);
        });

        function updateDropdownOptions(dropdownNumber) {
            const currentDropdown = $('#TOPIC' + dropdownNumber);
            const previousDropdown = $('#TOPIC' + (dropdownNumber - 1));

            // Clone the original options
            const options = previousDropdown.find('option').clone();

            // Remove the selected option from the options
            const selectedOptionValue = previousDropdown.val();
            currentDropdown.find('option').remove();
            options.each(function() {
                if ($(this).val() !== selectedOptionValue) {
                    currentDropdown.append($(this));
                }
            });

            // Add an empty option
            currentDropdown.prepend($('<option></option>'));
        }
    });

</script>


{{-- <section style="text-align: right; " class="hk-sec-wrapper">
        <h5 class="hk-sec-title">المجموعات</h5>
        <p>يمكنك حذف المجموعة فقط إذا لم يكن هناك أي مقال أو فيديو مرتبط به</p>
        <a class="btn btn-primary" type="button" href="/posts/addgroups">إضافة مجموعة جديد</a>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <table style="direction: rtl;" id="datable_5" class="table table-hover w-100 display">
                        <thead>
                            <tr>
                                <th>عنوان المجموعة</th>
                                <th>ID</th>
                                <th>تاريخ الإنشاء</th>
                                <th>عدد المشاهدات</th>
                                <th>عدد المواضيع</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $postsgroup)
                                <tr>
                                    <td>{{ $postsgroup->TITLE }}</td>
<td>{{ $postsgroup->id }}</td>
<td>{{ $postsgroup->DATE }}</td>
<td>{{ $postsgroup->REED }}</td>
<td>
    <?php
                                        $num = 0;
                                        foreach ($posts as $postsgroupnum) {
                                            if ($postsgroupnum->TOPIC == $postsgroup->id) {
                                                $num++;
                                            }
                                        }
                                        ?>
    {{ $num }}
</td>
<td><a class="btn btn-primary" type="button" href="/posts/groups/{{ $postsgroup->id }}/edit">تعديل</a></td>
@if ($num == 0)
<td><a type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $postsgroup->id }}">حذف</a></td>
@endif
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</section> --}}
{{--
    @foreach ($groups as $post)
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
            <p>هل تريد حذف عنوان "{{ $post->TITLE }}"</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">خروج</button>
            <form action="/groups/delete/{{ $post->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" name="id" value="{{ $post->id }}">
                <button class="btn btn-danger" type="submit">حذف</button>
            </form>
        </div>
    </div>
</div>
</div>
@endforeach --}}


@endsection
