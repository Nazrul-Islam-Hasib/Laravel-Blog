@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-heading">
		<h2>All Users</h2>
	</div>
	<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<th>Avatar</th>
				<th>Name</th>
				<th>Permission</th>
				<th>Delete</th>
			</thead>
			<tbody>
				@if($users->count() > 0)
				  @foreach($users as $user)
                   <tr>
                     <td>
                     	<img src="{{ asset($user->profile->avatar) }}" alt="avatar" width="60px" height="60px" style="border-radius: 50%;">
                     </td>
                     <td>
                     	{{ $user->name }}
                     </td>
                     <td>
                     	@if($user->admin)
                     	  <a href="{{ route('user.not_admin', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Remove permissions</a> 

                     	@else
                     	  <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Make Admin</a> 
                     	@endif  
                     </td>
                     <td>
                     	@if(Auth::id() !== $user->id)
                     	  <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Delete</a> 
                     	@endif
                     </td>
                   </tr>
				  @endforeach
				@else
				     <tr>
				        <th class="text-center"><h1>No Users</h1></th>
				     </tr>
				@endif
			</tbody>
		</table>
	</div>
</div>
@stop
