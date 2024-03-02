@extends('layouts.dashboard')
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-o8tXcO+pfL3L3hWn65WkhD5I6vq0pTl5s4eiF0DabJ0=" crossorigin="anonymous"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
    button{
    border:none;
    border-radius: 12px;
    background-color: transparent;
}
    .preloader {
    display: none;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
.addedtags{
    background-color: #ffffff;
    display: flex;
    align-items: center;

}
.addedtags. li {
    background-color: #eee;
    direction: rtl
}
.form-group{
    display: flex;
    flex-direction: column;
}
.h43{
    margin:20px 0 20px 60px
}
li{
    direction: ltr;
}
.selectedtagwithbutton{
    height: fit-content;
    padding: 10px;
    background-color: #1e35dd;
    border-radius: 12px;
    color: white;
    margin-left: 10px;
}
.tag-form-container{
    display: flex;
    justify-content: right;
    margin-bottom: 10px
}
.button-text {
    /* Add any specific styles for your "Save" button here */
    background-color: #4caf50; /* Green background color */
    color: #fff;
    padding: 8px 15px ;
    border-radius: 12px;
    margin-bottom: 10px;
}

</style>
@section('content')
<div class="row">
    @for ($i = 1; $i <= 8; $i++)

    <div class="col-md-12 col-sm-12 col-12" dir="rtl">
        <ul id="selectedTagList{{ $i }}" class="addedtags">
       @php
        //    $singletagtag= array_fillter(explode(',',App/Models/Tag::find($id)->order));
        $neededTags = App\Models\Tag::where('order', 'like', '%' . $i . '%')->get();


       @endphp
<h4 class="h43">التاغات المختاره للجزء {{$i}}</h4>
@foreach ($neededTags as $nedded )
<li  class="selectedtagwithbutton">{{ $nedded->TITLE }}

<button class="delete-btn" data-id="{{ $nedded->id }} " data-sectionId="{{ $i }}" data-tagname="{{  $nedded->TITLE }}"><i class="fa-solid fa-x"></i></button></li>


@endforeach
        </ul>
    </div>
        <div class="col-md-12 col-sm-12 col-12" dir="rtl">
            <div class="form-group" dir="rtl">
                <label  dir="rtl" style="text-align: right" for="tital{{ $i }}"> التاغ المراد عرضها في الجزء {{ $i }} </label>
                <select id="TOPIC{{ $i }}" name="SectionOneTag" class="form-control @error('TOPIC' . $i) is-invalid @enderror select2">
                    <option value="" selected></option>
                    @foreach ($tags as $tag)
                    @php
                        $notNeddedTags=array_filter(explode(',',$tag->order)) ;

                    @endphp
                    @if (!in_array($i,$notNeddedTags))


                        <option value="{{ $tag->id }}">
                            {{ $tag->TITLE }}
                        </option>
                        @endif
                    @endforeach
                </select>
                <input type="hidden" name="">
                @error('TOPIC' . $i)
                    <span class="invalid-feedback" role="alert">
                        <strong>تصنيف المقال مطلوب</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="tag-form-container col-12" id="tagFormContainer{{ $i }}">
            <form id="tagForm{{ $i }}" class="tag-form" action="{{ route('contenmangment.update', ['id' => $i]) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="hidden" id="tagInput{{ $i }}" name="selectedTag{{ $i }}" value="">
                <button type="submit" class="submit-button">
                    <span class="preloader"></span>

                    <span class="button-text">حفظ </span>
                    <span class="saved-text" style="display: none;background:#eee;color: #877c7c">تم الحفظ</span>
                </button>
            </form>
        </div>
    @endfor
</div>


<script>
    var selectElement;

function newoption(name, tagid) {
    console.log('name',name);
    console.log('tagid',tagid);
    var newOption = new Option(name, tagid, false, false);
    selectElement.append(newOption).trigger('change');
}
 document.addEventListener('DOMContentLoaded', function (event) {
    event.preventDefault();

// Define newoption globally

    function initializeSelect2(id) {
         selectElement = $('#' + id);
        var ulElement = document.getElementById('selectedTagList' + id.slice(-1));
        var tagForm = document.getElementById('tagForm' + id.slice(-1));
        var tagInput = document.getElementById('tagInput' + id.slice(-1));

        selectElement.on('select2:select', function (e) {
    e.preventDefault();
    var form = $(this);
    var submitButton = form.find('.submit-button');
    var savedText = submitButton.find('.saved-text');
    savedText.show();
            // Check if the selected option is not none
            if (e.params.data.id) {
                // Create a new list item with a delete button
                var liElement = createLiElement(e.params.data);
                ulElement.appendChild(liElement);

                // Clear the selected option in the select2 dropdown
                e.params.data.element.remove();
                selectElement.val(null).trigger('change');
                // Add the selected tag ID to the hidden input for back end
                tagInput.value += "," + e.params.data.id;

                // tagForm.submit();
            }
        });

        // Function to create new option

        // Function to create a new li element with a delete button
        function createLiElement(tagData) {
            var liElement = document.createElement('li');
            liElement.textContent = tagData.text;
            liElement.classList.toggle('selectedtagwithbutton');

            // Create a delete button
            var deleteButton = document.createElement('button');
            deleteButton.innerHTML = '<i class="fa-solid fa-x"></i>';
            deleteButton.classList.toggle('delete-btn');
            deleteButton.dataset.id = tagData.id;

            deleteButton.dataset.sectionid = id[id.length-1];

            var deleteButtonn = $(this);
            var liElementibefourdeletbutton = deleteButtonn.closest('li')
            console.log('deleteButtonn',deleteButtonn[0].innerHTML);
            console.log('liElementibefourdeletbutton',liElementibefourdeletbutton);
            var title = liElementibefourdeletbutton.text().trim()
            deleteButton.dataset.tagname = title;
            console.log('title',title);
            deleteButton.addEventListener('click', function () {
                ulElement.removeChild(liElement);

                var newOption = new Option(tagData.text, tagData.id, false, false);
                selectElement.append(newOption).trigger('change');

                // Clear the hidden input value
                var tagValue = tagInput.value;
                var tagInputArray = tagValue.split(',');

                // Filter out the deleted tag ID from the array
                tagInputArray = tagInputArray.filter(function (tagValue) {
                    return tagValue != tagData.id;
                });

                // Update the hidden input value
                tagInput.value = tagInputArray.join(',');
            });

            // Append the delete button to the li element
            liElement.appendChild(deleteButton);

            return liElement;
        }
    }

    // Initialize select2 for each select
    for (var i = 1; i <= 8; i++) {
        initializeSelect2('TOPIC' + i);
    }

    // Handle the click event for the "Submit All Forms" button

    $('.tag-form').on('submit', function (e) {
    e.preventDefault();

    var form = $(this);
    var tagNumber = form.attr('id').replace('tagForm', '');
    var tagInput = form.find('input[name^="selectedTag"]');
    var selectedTags = tagInput.val();
    var submitButton = form.find('.submit-button');
    var preloader = submitButton.find('.preloader');
    var buttonText = submitButton.find('.button-text');
    var savedText = submitButton.find('.saved-text');

    // Get the CSRF token from the meta tag
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    // Include the CSRF token in the data
    var requestData = {
        _token: csrfToken,
        selectedTag: selectedTags
    };

    // Show loading spinner
    preloader.show();

    // Send an AJAX request for the form
    $.ajax({
        url: form.attr('action'),
        method: 'PATCH',
        data: requestData,
        success: function (data) {
            // Handle success response
            if (data.status === 'success') {
                // Hide loading spinner on success
                preloader.hide();

                // Change the background color of the submit button to green
                submitButton.css('background-color', 'green');

                // Show the "Saved" text and hide the "Submit" text
                buttonText.hide();
                savedText.show();

                // Update the page content or display a success message
                console.log('Data processed successfully');
            }
        },
        error: function (error) {
            // Handle error response if needed
            console.error('Error in form submission', error);

            // Hide loading spinner on error
            preloader.hide();
        }
    });

});


});



</script>

@endsection
