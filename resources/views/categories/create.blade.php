@extends('layouts.app')

@section('content')
<h1 style="text-align:center; margin-top:20px"> دسته بندی جدید </h1>
<div class="row">
<div class="col-md-6 offset-md-3 create-category">
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

	<div  class="form-group">
		{{ Form::label('parent_id', 'Parent Category') }}
		{{ Form::select('parent_id', $categories, null, array('placeholder' => 'select one', 'class' => 'form-control')) }}
	</div>
	<div  class="btn-category">
	{{ Form::submit('ایجاد دسته بندی', array('class' => 'btn btn-primary ')) }}
</div>
{{ Form::close() }}
</div>
</div>
@endsection
