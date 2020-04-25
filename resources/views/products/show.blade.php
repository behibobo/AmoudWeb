@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12">
            <form method="post" action="{{url('admin/storeImage')}}" enctype="multipart/form-data">
  {{csrf_field()}}


    <div class="input-group hdtuto control-group lst increment" >
      <input type="file" name="images[]" class="myfrm form-control">
    <input type="hidden" name="product_id" value="{{ $product->id}}">
    </div>
    


    <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>

</form>
</div>
</div>
<div class="row">
        @foreach($images as $image)

        <div class="image_box">
          <div class="panel panel-default">
            <div class="panel-body">
              <img src="{{ asset('uploads/'.$image->filename)}}" alt="">              
            </div>
          </div>
        </div>

        @endforeach
      </div>
@endsection