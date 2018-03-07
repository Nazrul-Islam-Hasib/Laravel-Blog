@extends('layouts.app')

@section('content')
<!--include takes all the data from a different file-->
@include('admin.includes.errors')
  
  <div class="panel panel-default">
  	<div class="panel-heading">
  		<h4>Create a new Category</h4>
  	</div>
  	<div class="panel-body admin-item">
  		<form action="{{ route('category.store') }}" method="post">
  			
  			{{ csrf_field() }}

  			<div class="form-group">
  				<label for="name">Name</label>
  				<input type="text" name="name" class="form-control">
  			</div>

  			<div class="form-group">
  				<div class="text-center">
  					<button class="btn btn-success" type="Submit">Store category</button>
  				</div>
  			</div>

  		</form>
  	</div>
  </div>

@stop