@extends('layouts.app')

@section('content')
<h1>Edit {{ $product->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($product, array('action' => array('ProductsController@update', $product->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('slug', 'Slug') }}
		{{ Form::text('slug', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('desc', 'Description') }}
		{{ Form::textarea('desc', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('category_id', 'category') }}
		{{ Form::select('category_id', $categories, $product->category_id, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit the Product!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection
