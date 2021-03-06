@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-6 offset-md-3 create-category-sub">
<h1 > ویرایش {{ $category->name }}</h1>
</div>
</div>
<div class="row">
<div class="col-md-6 offset-md-3 create-category">
<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::model($category, array('action' => array('CategoriesController@update', $category->id), 'method' => 'PUT')) }}

	<div class="form-group ">
		{{ Form::label('name', 'نام دسته بندی') }}
		{{ Form::text('name', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group ">
		{{ Form::label('slug', 'کلمه کلیدی') }}
		{{ Form::text('slug', null, array('class' => 'form-control')) }}
	</div>

	<div class="form-group ">
		{{ Form::label('parent_id', 'زیر گروه') }}
		{{ Form::select('parent_id', $categories, $category->parent_id, array('placeholder' => 'انتخاب زیر گروه', 'class' => 'form-control')) }}
	</div>
	<div class="btn-category">
	{{ Form::submit('ویرایش دسته بندی', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</div>
</div>
@endsection
