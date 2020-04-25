@extends('layouts.app')

@section('content')

<div class="row">
<div class="col-md-3"></div>
            <div class="col-md-4">
            <form method="post" action="{{url('admin/storeImage')}}" enctype="multipart/form-data">
  {{csrf_field()}}


    <div  class="input-group hdtuto control-group lst increment edit-show-product" >
      <input style="border:none" type="file" name="images[]" class="myfrm form-control">
    <input type="hidden" name="product_id" value="{{ $product->id}}">
    </div>
    

   

</form>
</div>

<div class="col-md-2">
    <button type="submit" class="btn btn-success" style="margin:20px; width:100%">Submit</button>
</div>
<div class="col-md-3"></div>
</div>
<div class="row">
        @foreach($images as $image)
        <div class="col-md-4"></div>

        <div  class="image_box col-md-4 image-show-product">
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="{{ asset('uploads/'.$image->filename)}}" alt="">              
            </div>
          </div>
          <div class="col-md-4"></div>

        </div>

        @endforeach
      </div>
@endsection