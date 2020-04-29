@extends('layouts.app')

@section('content')
<h1 style="text-align:center; padding-bottom:20px;"></h1>

<div style="text-align:right; margin:20px;">
<a class="new-category" href="/admin/products/create">محصول جدید</a>
</div>
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table style="direction:rtl" class="table table-striped table-bordered">
	<thead>
		<tr class='title-products'>
			<td>آی دی</td>
			<td>نام محصول</td>
			<td>کلمه کلیدی</td>
			<td>دسته بندی </td>
			<td>اقدامات</td>
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
<div style="width:50%;margin:auto">
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
</div>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
