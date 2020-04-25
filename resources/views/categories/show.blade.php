@extends('layouts.app')

@section('content')
{{ HTML::ul($errors->all() )}}

{{ Form::open(array('url' => 'categories')) }}
<h1>Showing {{ $category->name }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $category->name }}</h2>
		<p>
			<strong>slug:</strong> {{ $category->slug }}<br>
			<strong>parent:</strong> {{ $category->parent->name ?? "" }}
		</p>
	</div>
@endsection