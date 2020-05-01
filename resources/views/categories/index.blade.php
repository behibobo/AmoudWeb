@extends('layouts.app')

@section('content')
<div class="row">
	<div class="col-md-10 offset-md-1">

<h1 style="text-align:center;  padding-bottom:20px; "></h1>
<div style="text-align:right; margin:20px; ">

<a class="new-category" href="/admin/categories/create"> دسته بندی جدید </a>
</div>


<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table style="direction:rtl;box-shadow: 5px 3px 18px #ccc" class="table table-striped table-bordered">
	<thead>
		<tr class='title-category'>
			<td>آی دی</td>
			<td>نام دسته بندی</td>
			<td>کلمه کلیدی</td>
			<td>زیر گروه</td>
			<td>اقدامات</td>
		</tr>
	</thead>
	<tbody>
	@foreach($categories as $key => $value)
		<tr class='category-detail'>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>
			<td>{{ $value->slug }}</td>
			<td>{{ $value->parent->name ?? "" }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td class="action-category">
				<div style="width:60%;margin:auto">

				<!-- delete the Category (uses the destroy method DESTROY /categories/{id} -->
				<!-- we will add this later since its a little more complicated than the first two buttons -->
				{{ Form::open(array('url' => 'admin/categories/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('حذف دسته بندی', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the Category (uses the show method found at GET /categories/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('admin/categories/' . $value->id) }}">نمایش دسته بندی</a>

				<!-- edit this Category (uses the edit method found at GET /categories/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('admin/categories/' . $value->id . '/edit') }}">ویرایش دسته بندی</a>
				</div>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
</div>
</div>
@endsection
