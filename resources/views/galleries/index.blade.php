@extends('layouts.app')

@section('content')

<div class="row" style="margin-top:20px">
  
  <div class="col-md-4 offset-md-4" style="text-align:center;">
    <form method="post" action="{{url('admin/galleries')}}" enctype="multipart/form-data">
      {{csrf_field()}}


      <div  class="input-group hdtuto control-group lst increment edit-show-project">
        <input  style="border:none" type="file" name="images[]" class="myfrm form-control" multiple>
      </div>

      <button type="submit" class="btn btn-success" style="margin:20px; width:50%">آپلود عکس</button>


    </form>
  </div>

  
</div>
<div class="row" style="margin-bottom:30px;direction:rtl">
<div class="col ">
<div style="flex-wrap:wrap" class="image_container">
  @foreach($images as $image)

  <div class="image_box" style="min-width:25%;border:1px solid rgb(31, 199, 45);border-radius:10px 10px 0 0;">
        <img  style="border-radius:10px 10px 0 0;" src="{{ asset('uploads/galleries/'.$image->filename)}}" alt="">
        <div style="text-align:center; margin-top:10px">
		<a  href="/admin/removeImage/{{$image->id}}" class="btn btn-danger btn-xs">
			حذف عکس
		</a>
    </div>
  </div>
  @endforeach
  </div>
</div>
</div>
@endsection