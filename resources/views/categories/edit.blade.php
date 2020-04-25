@extends('layouts.app')

@section('content')
<h1>Edit {{ $category->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($category, array('action' => array('CategoriesController@update', $category->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('slug', 'Slug') }}
		{{ Form::text('slug', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('parent_id', 'Parent Category') }}
		{{ Form::select('parent_id', $categories, $category->parent_id, array('placeholder' => 'select one', 'class' => 'form-control')) }}
	</div>

	{{ Form::submit('Edit the Category!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection
