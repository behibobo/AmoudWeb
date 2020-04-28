@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-md-8 offset-md-2">
<h1 style="text-align:center; padding-bottom:20px;"></h1>

<div style="text-align:right; margin:20px;">
<a class="new-category" href="/admin/projects/create">پروژه جدید</a>
</div>
<!-- will be used to show any messages -->
@if (Session::has('message'))
	<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table style="direction:rtl" class="table table-striped table-bordered">
	<thead>
		<tr class='title-projects'>
			<td>ID</td>
			<td>Name</td>
			<td>Actions</td>
		</tr>
	</thead>
	<tbody>
	@foreach($projects as $key => $value)
		<tr class='projects-detail'>
			<td>{{ $value->id }}</td>
			<td>{{ $value->name }}</td>

			<!-- we will also add show, edit, and delete buttons -->
			<td class="action-project">

				<!-- delete the Project (uses the destroy method DESTROY /projects/{id} -->
				<!-- we will add this later since its a little more complicated than the first two buttons -->
				{{ Form::open(array('url' => 'admin/projects/' . $value->id, 'class' => 'pull-right')) }}
					{{ Form::hidden('_method', 'DELETE') }}
					{{ Form::submit('حذف محصول', array('class' => 'btn btn-warning')) }}
				{{ Form::close() }}

				<!-- show the Project (uses the show method found at GET /projects/{id} -->
				<a class="btn btn-small btn-success" href="{{ URL::to('admin/projects/' . $value->id) }}">نمایش محصول</a>

				<!-- edit this Project (uses the edit method found at GET /projects/{id}/edit -->
				<a class="btn btn-small btn-info" href="{{ URL::to('admin/projects/' . $value->id . '/edit') }}">ویرایش محصول</a>

			</td>
		</tr>
	@endforeach
	</tbody>
</table>
</div>
</div>
@endsection
