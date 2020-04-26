@extends('layouts.app')

@section('content')
<h1>Create a project</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'admin/projects')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('desc', 'Description') }}
		{{ Form::textarea('desc', Request::old('desc'), array('class' => 'form-control')) }}
	</div>


	{{ Form::submit('Create the project!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}
@endsection
