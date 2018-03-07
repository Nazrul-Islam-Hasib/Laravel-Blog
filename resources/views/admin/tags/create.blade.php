@extends('layouts.app')

@section('content')
<!--include takes all the data from a different file-->
@include('admin.includes.errors')
  
  <div class="panel panel-default">
  	<div class="panel-heading">
  		<h4>Create a new Tag</h4>
  	</div>
  	<div class="panel-body admin-item">
  		<form action="{{ route('tag.store') }}" method="post">
  			
  			{{ csrf_field() }}

  			<div class="form-group">
  				<label for="tag">Tag</label>
  				<input type="text" name="tag" class="form-control">
  			</div>

  			<div class="form-group">
  				<div class="text-center">
  					<button class="btn btn-success" type="Submit">Store tag</button>
  				</div>
  			</div>

  		</form>
  	</div>
  </div>

@stop