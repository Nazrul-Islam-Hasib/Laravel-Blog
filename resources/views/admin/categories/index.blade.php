@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Categories</h2>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Category name</th>
				<th>Editing</th>
				<th>Deleting</th>
			</thead>
			<tbody>
				@if($categories->count() > 0)
				@foreach($categories as $category)
				<tr>
					<td>
						{{ $category->name}}
					</td>
					<td>
						<a href="{{ route('category.edit',['id' => $category->id ]) }}" class="btn btn-xs btn-info">
							edit
						</a>
					</td>
					<td>
						<a href="{{ route('category.delete',['id' => $category->id ]) }}" class="btn btn-xs btn-danger">
							x
						</a>
					</td>
				</tr>
				@endforeach

				@else
				<tr>
					<th class="text-center"><h1>No categories yet</h1></th>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
@stop
