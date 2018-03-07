@extends('layouts.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">
    <h2>Trashed posts</h2>
  </div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Image</th>
				<th>Title</th>
				<th>Edit</th>
				<th>Restore</th>
				<th>Destroy</th>
			</thead>
			<tbody>
			  @if($posts->count() > 0)
                        @foreach($posts as $post)
                           <tr>
                              <td>
                                    <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="100px" height="60px">
                              </td>
                              <td>
                              {{ $post->title }}
                              </td>
                              <td>
                                    Edit
                              </td>
                              <td>
                                    <a href="{{ route('post.restore', ['id' => $post->id]) }}" class="btn btn-xs btn-success">Restore</a>
                              </td>
                              <td>
                                    <a href="{{ route('post.kill', ['id' => $post->id]) }}" class="btn btn-xs btn-danger">Destroy</a>
                              </td>
                           </tr>
                        @endforeach
                     @else
                          <tr>
                                <th class="text-center"><h1>No Trashed Posts</h1></th>
                          </tr>
                     @endif
			</tbody>
		</table>
	</div>
</div>
@stop
