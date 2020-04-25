@extends('layouts.app')

@section('content')
<h1>Create a category</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'admin/categories')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('slug', 'Slug') }}
		{{ Form::text('slug', Request::old('slug'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('parent_id', 'Parent Category') }}
		{{ Form::select('parent_id', $categories, null, array('placeholder' => 'select one', 'class' => 'form-control')) }}
	</div>

	{{ Form::submit('Create the category!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection
