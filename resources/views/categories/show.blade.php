@extends('layouts.app')

@section('content')
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'categories')) }}
<h1 class="edit-category">نمایش {{ $category->name }}</h1>

	<div style="direction:rtl;" class="jumbotron text-center show-category">

	<div >
	<span >نام دسته بندی :</span>	
	<span>{{ $category->name }}</span>

	</div>
	<div >
	<span >کلمه کلیدی :</span>	
	<span>{{ $category->slug }}</span>

	</div>
	<div >
	<span >زیرگروه :</span>	
	<span>{{ $category->parent->name ?? "" }}</span>

	</div>
	</div>
@endsection