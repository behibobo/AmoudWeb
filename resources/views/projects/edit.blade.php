@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-6 offset-md-3 create-project">

<div style="margin-top:20px">
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($project, array('action' => array('ProductsController@update', $project->id), 'method' => 'PUT')) }}

	<div class="form-group">
		{{ Form::label('name', 'نام پروژه') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>


	<div class="form-group">
		{{ Form::label('desc', 'توضیحات') }}
		{{ Form::textarea('desc', null, array('class' => 'form-control')) }}
	</div>
	<div class="btn-project">
	{{ Form::submit('ویرایش محصول', array('class' => 'btn btn-primary ')) }}

{{ Form::close() }}
</div>
</div>
</div>
@endsection
