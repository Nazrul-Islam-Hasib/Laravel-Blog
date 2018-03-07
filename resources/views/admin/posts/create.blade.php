@extends('layouts.app')

@section('content')
<!--include takes all the data from a different file-->
@include('admin.includes.errors')
  
  <div class="panel panel-default">
  	<div class="panel-heading">
  		<h4>Create a new post</h4>
  	</div>
  	<div class="panel-body admin-item">
  		<form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
  			
  			{{ csrf_field() }}

  			<div class="form-group">
  				<label for="title"><h4>Title</h4></label>
  				<input type="text" name="title" class="form-control">
  			</div>

  			<div class="form-group">
  				<label for="featured"><h4>Featured image</h4></label>
  				<input type="file" name="featured" class="form-control">
  			</div>

        <div class="form-group">
          <label for="category"><h4>Select a Category</h4></label>
          <select name="category_id" id="category">
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
          <label for="tags"><h4>Select tags</h4></label>
          @foreach($tags as $tag)
          <div class="checkbox">
            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label>
          </div>
          @endforeach
        </div>

  			<div class="form-group">
  				<label for="content"><h4>Content</h4></label>
  				<textarea name="content" id="content" rows="5" cols="5" class="form-control"></textarea>
  			</div>
  			<div class="form-group">
  				<div class="text-center">
  					<button class="btn btn-success" type="Submit">Store post</button>
  				</div>
  			</div>

  		</form>
  	</div>
  </div>

@stop

@section('styles')

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">

@stop


@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<!--Here the #content is the id of the textarea(which we want to include wysiwyg editor)-->
<script>
  $(document).ready(function() {
    $('#content').summernote();
  });
</script>

@stop