@extends('layouts.app')

@section('content')

<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <form method="post" action="{{url('admin/productImage')}}" enctype="multipart/form-data">
      {{csrf_field()}}


      <div class="input-group hdtuto control-group lst increment edit-show-product">
        <input style="border:none" type="file" name="images[]" class="myfrm form-control" multiple>
        <input type="hidden" name="item_id" value="{{ $product->id}}">
      </div>

      <button type="submit" class="btn btn-success" style="margin:20px; width:100%">Submit</button>


    </form>
  </div>

  <div class="col-md-4"></div>
</div>
<div class="row" style="margin-bottom:30px">
<div class="col-md-2"></div>
<div class="col-md-8">
<div class="image_container">
  @foreach($images as $image)

  <div class="image_box" >
        <img  style="border-radius:10px;" src="{{ asset('uploads/products/'.$image->filename)}}" alt="">
      
  </div>
  @endforeach
  </div>

</div>
<div class="col-md-2"></div>
</div>
@endsection