@extends('layouts.app')

@section('content')
<h1 >محصولات </h1>


<a href="/admin/products/create">محصول جدید</a>
<br><br>
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr class='title-products'>
			<td>ID</td>
			<td>Name</td>
			<td>Slug</td>
			<td>Category</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($products as $key => $value)
		<tr class='products-detail'>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->slug }}</td>
			<td>{{ $value->category->name}}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td class="action-product">

				<!-- delete the Product (uses the destroy method DESTROY /products/{id} -->
				<!-- we will add this later since its a little more complicated than the first two buttons -->
				{{ Form::open(array('url' => 'admin/products/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('حذف محصول', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the Product (uses the show method found at GET /products/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('admin/products/' . $value->id) }}">نمایش محصول</a>

				<!-- edit this Product (uses the edit method found at GET /products/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('admin/products/' . $value->id . '/edit') }}">ویرایش محصول</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
