@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-6 offset-md-3 create-category-sub">
<h1  > دسته بندی جدید </h1>
</div>
</div>
<div class="row">
<div class="col-md-6 offset-md-3 create-category">
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'admin/categories')) }}

	<div class="form-group">
		{{ Form::label('name', 'نام دسته بندی') }}
		{{ Form::text('name', Request::old('name'), array('class' => 'form-control')) }}
	</div>

	<div class="form-group">
		{{ Form::label('slug', 'کلمه کلیدی') }}
		{{ Form::text('slug', Request::old('slug'), array('class' => 'form-control')) }}
	</div>

	<div  class="form-group">
		{{ Form::label('parent_id', 'زیر گروه') }}
		{{ Form::select('parent_id', $categories, null, array('placeholder' => 'انتخاب زیر گروه', 'class' => 'form-control')) }}
	</div>
	<div  class="btn-category">
	{{ Form::submit('ایجاد دسته بندی', array('class' => 'btn btn-primary ')) }}
</div>
{{ Form::close() }}
</div>
</div>
@endsection
