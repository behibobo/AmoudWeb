@extends('layouts.app')

@section('content')

<div class="row" style="margin-top:20px">
  
  <div class="col-md-4 offset-md-4" style="text-align:center;">
    <form method="post" action="{{url('admin/galleries')}}" enctype="multipart/form-data">
      {{csrf_field()}}


      <div class="input-group hdtuto control-group lst increment edit-show-project">
        <input style="border:none" type="file" name="images[]" class="myfrm form-control" multiple>
      </div>

      <button type="submit" class="btn btn-success" style="margin:20px; width:50%">Submit</button>


    </form>
  </div>

  
</div>
<div class="row" style="margin-bottom:30px;">
<div class="col-md-8 offset-md-2">
<div class="image_container">
  @foreach($images as $image)

  <div class="image_box" >
        <img  style="border-radius:10px;" src="{{ asset('uploads/galleries/'.$image->filename)}}" alt="">
		<a href="/admin/removeImage/{{$image->id}}" class="btn btn-danger btn-xs">
			delete
		</a>
  </div>
  @endforeach
  </div>
</div>
</div>
@endsection