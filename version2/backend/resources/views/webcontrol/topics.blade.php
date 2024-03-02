@extends('layouts.dashboard')

@section('content')


<section style="direction: rtl; text-align: right;" class="hk-sec-wrapper">
    <h5 class="hk-sec-title">إضافة تصنيف جديد</h5>
    <div class="row">
        <div class="col-sm">
            <form action="/posts" enctype="multipart/form-data" method="POST">
               @csrf

               <div class="form-group">
                <label for="tital">عنوان التصنيف</label>
                <input id="tital" type="text" class="form-control @error('tital') is-invalid @enderror" name="tital" value="{{ old('tital') }}" autocomplete="tital" autofocus>
                @error('tital')
                <span class="invalid-feedback" role="alert">
                    <strong>عنوان المقال مطلوب</strong>
                </span>
            @enderror
            </div>
            
            <div class="form-group">
                <label for="tital">شرح التصنيف</label>
                <input id="tital" type="text" class="form-control @error('tital') is-invalid @enderror" name="tital" value="{{ old('tital') }}" autocomplete="tital" autofocus>
                @error('tital')
                <span class="invalid-feedback" role="alert">
                    <strong>عنوان المقال مطلوب</strong>
                </span>
            @enderror
            </div>



                <div  class="row pt-4">
                    <div class="col-sm">
                        <button class="btn btn-primary" type="submit">إضافة</button>                    </div>
                </div>
 
                
            </form>
        </div>
    </div>
</section>








@endsection
