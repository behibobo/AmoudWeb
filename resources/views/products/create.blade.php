@extends('layouts.app')

@section('content')
<h1 style="text-align:center; margin-top:20px"> محصول جدید</h1>
<div class="row">
<div class="col-md-6 offset-md-3 create-product">

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'admin/products')) }}

	<div class="form-group">
		{{ Form::label('name', 'نام محصول') }}
		{{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('slug', 'کلمه کلیدی') }}
		{{ Form::text('slug', Request::old('slug'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('desc', 'توضیحات محصول') }}
		{{ Form::textarea('desc', Request::old('desc'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('category_id', 'دسته بندی محصول') }}
		{{ Form::select('category_id', $products, null, array('class' => 'form-control')) }}
	</div>
	<div class="btn-product">
	{{ Form::submit('ایجاد محصول', array('class' => 'btn btn-primary')) }}
	</div>
{{ Form::close() }}

</div>
</div>
@endsection
