@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-6 offset-md-3 create-category-sub">
<h1 >ایجاد پروژه جدید</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 offset-md-3 create-project">

<div >
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