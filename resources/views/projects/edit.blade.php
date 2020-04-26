@extends('layouts.app')

@section('content')
<h1 class="edit-category" >ویرایش  {{ $project->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($project, array('action' => array('ProductsController@update', $project->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'Name') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>


	<div class="form-group">
		{{ Form::label('desc', 'Description') }}
		{{ Form::textarea('desc', null, array('class' => 'form-control')) }}
	</div>
	<div class="edit-button-project">
	{{ Form::submit('ویرایش محصول', array('class' => 'btn btn-primary ')) }}

{{ Form::close() }}
</div>
@endsection
