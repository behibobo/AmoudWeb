@extends('layouts.app')

@section('content')
<h1 style="text-align:center; margin-top:20px">ایجاد پروژه جدید</h1>
<div class="row">
<div class="col-md-6 offset-md-3 create-project">

<div style="margin-top:20px">
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'admin/projects')) }}

	<div class="form-group">
		{{ Form::label('name', 'نام پروژه') }}
		{{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('desc', 'توضیحات') }}
		{{ Form::textarea('desc', Request::old('desc'), array('class' => 'form-control')) }}
	</div>

	<div class="btn-project">
	{{ Form::submit('ایجاد پروژه', array('class' => 'btn btn-primary ')) }}
	</div>
{{ Form::close() }}
@endsection
</div>
</div>
</div>