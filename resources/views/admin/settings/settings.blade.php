@extends('layouts.app')

@section('content')
<!--include takes all the data from a different file-->
@include('admin.includes.errors')
  
  <div class="panel panel-default">
  	<div class="panel-heading">
  		<h4>Edit blog settings</h4>
  	</div>
  	<div class="panel-body admin-item">
  		<form action="{{ route('settings.update') }}" method="post">
  			
  			{{ csrf_field() }}

  			<div class="form-group">
  				<label for="name">Site name</label>
  				<input type="text" name="site_name" value="{{ $settings->site_name }}" class="form-control">
  			</div>

        <div class="form-group">
          <label for="name">Address</label>
          <input type="text" name="address" value="{{ $settings->address }}" class="form-control">
        </div>

  			<div class="form-group">
          <label for="name">Contact phone</label>
          <input type="text" name="contact_number" value="{{ $settings->contact_number }}" class="form-control">
        </div>

        <div class="form-group">
          <label for="name">Contact email</label>
          <input type="text" name="contact_email" value="{{ $settings->contact_email }}" class="form-control">
        </div>

        <div class="form-group">
          <div class="text-center">
            <button class="btn btn-success" type="Submit">Update site settings</button>
          </div>
        </div>

  		</form>
  	</div>
  </div>

@stop