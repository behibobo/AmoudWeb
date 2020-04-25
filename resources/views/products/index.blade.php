@extends('layouts.app')

@section('content')
<h1>All the products</h1>

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
			<td>Category</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($products as $key => $value)
		<tr>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->slug }}</td>
			<td>{{ $value->category->name}}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td>

				<!-- delete the Product (uses the destroy method DESTROY /products/{id} -->
				<!-- we will add this later since its a little more complicated than the first two buttons -->
				{{ Form::open(array('url' => 'admin/products/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('Delete this Product', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the Product (uses the show method found at GET /products/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('admin/products/' . $value->id) }}">Show this Product</a>

				<!-- edit this Product (uses the edit method found at GET /products/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('admin/products/' . $value->id . '/edit') }}">Edit this Product</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
