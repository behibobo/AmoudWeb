@extends('layouts.app')

@section('content')
<h1>All the categories</h1>

<a href="/admin/categories/create">new</a>
<br><br>

<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<td>ID</td>
			<td>Name</td>
			<td>Slug</td>
			<td>Parent</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($categories as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->slug }}</td>
			<td>{{ $value->parent->name ?? "" }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the Category (uses the destroy method DESTROY /categories/{id} -->
				<!-- we will add this later since its a little more complicated than the first two buttons -->
				{{ Form::open(array('url' => 'admin/categories/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Category', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the Category (uses the show method found at GET /categories/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('admin/categories/' . $value->id) }}">Show this Category</a>

				<!-- edit this Category (uses the edit method found at GET /categories/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('admin/categories/' . $value->id . '/edit') }}">Edit this Category</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
