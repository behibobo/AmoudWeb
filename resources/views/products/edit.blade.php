@extends('layouts.app')

@section('content')
<!-- <h1 class="edit-category" >ویرایش  {{ $product->name }}</h1> -->
<div class="row">
<div class="col-md-6 offset-md-3 edit-product">

<div style="margin-top:20px">
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($product, array('action' => array('ProductsController@update', $product->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'نام محصول') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('slug', 'کلمه کلیدی') }}
		{{ Form::text('slug', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('desc', 'توضیحات محصول') }}
		{{ Form::textarea('desc', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('category_id', 'دسته بندی') }}
		{{ Form::select('category_id', $categories, $product->category_id, array('class' => 'form-control')) }}
	</div>
	<div class="btn-product">
	{{ Form::submit('ویرایش محصول', array('class' => 'btn btn-primary ')) }}

{{ Form::close() }}
</div>
@endsection
