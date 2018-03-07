@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>Tags</h2>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Tag name</th>
				<th>Editing</th>
				<th>Deleting</th>
			</thead>
			<tbody>
				@if($tags->count() > 0)
				@foreach($tags as $tag)
				<tr>
					<td>
						{{ $tag->tag}}
					</td>
					<td>
						<a href="{{ route('tag.edit',['id' => $tag->id ]) }}" class="btn btn-info">
							edit
						</a>
					</td>
					<td>
						<a href="{{ route('tag.delete',['id' => $tag->id ]) }}" class="btn btn-danger">
							x
						</a>
					</td>
				</tr>
				@endforeach

				@else
				<tr>
					<th class="text-center"><h1>No tags yet</h1></th>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
@stop
