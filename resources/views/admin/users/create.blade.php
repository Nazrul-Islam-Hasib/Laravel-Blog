@extends('layouts.app')

@section('content')
<!--include takes all the data from a different file-->
@include('admin.includes.errors')
  
  <div class="panel panel-default">
  	<div class="panel-heading">
  		<h4>Create a new User</h4>
  	</div>
  	<div class="panel-body admin-item">
  		<form action="{{ route('user.store') }}" method="post">
  			
  			{{ csrf_field() }}

  			<div class="form-group">
  				<label for="name">User</label>
  				<input type="text" name="name" class="form-control">
  			</div>

        <div class="form-group">
          <label for="email">User Email</label>
          <input type="email" name="email" class="form-control">
        </div>

  			<div class="form-group">
  				<div class="text-center">
  					<button class="btn btn-success" type="Submit">Add User</button>
  				</div>
  			</div>

  		</form>
  	</div>
  </div>

@stop