@extends('layouts.app')

@section('content')
<h1>Create a product</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'admin/products')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('slug', 'Slug') }}
		{{ Form::text('slug', Request::old('slug'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('desc', 'Description') }}
		{{ Form::textarea('desc', Request::old('desc'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('category_id', 'Category') }}
		{{ Form::select('category_id', $products, null, array('class' => 'form-control')) }}
	</div>

	{{ Form::submit('Create the product!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection
