	@extends('layouts.pagelayout')

	@include('layouts.sidebar')
	
	@section('content')
	<nav aria-label="breadcrumb sticky-top">
	<ol class="breadcrumb">
		<a href="/home" class="breadcrumb-item">Home</a>
		<a href="/posts" class="breadcrumb-item">All Posts</a>
		<a class="breadcrumb-item active" aria-current="page">Create a Post</a>
	</ol>
	</nav>
	
	<div class="container">
		<div class="row justify-content-center" >
			<div class="col-md-8">
				<div class="card">
					<div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
						{{ __('Create a Post') }}
					</div>
					
					<!-- <div class="card-body"> -->
					
					{!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'class' => 'createform']) !!}
					
					<div class="form-group"> 
						{{Form::label('title', 'Enter a Title')}}
						{{Form::text('title', '', ['class' => 'form-control' , 'placeholder' => 'Entry Title'])}}
					</div>

					<div class="form-group"> 
						{{Form::label('body', 'Diary Entry')}}
						{{Form::textarea('body', '', ['class' => 'form-control' , 'placeholder' => 'Type in your thoughts here'])}}
					</div>

					<div class="form-group"> 
						{{Form::label('body', 'Add an Image')}}
						<input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="2097152" />
						<input type="file" onchange="upload_check()" id="file_id" name="image" class="form-control" multiple accept="image/*,video/*">
						<label>(File size should be max 2mb)</label>
					</div>

					<div class="form-group"> 
						{{Form::label('body', 'Add an Image')}}
						<input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="2097152" />
						<input type="file" onchange="upload_check()" id="file_id" name="image" class="form-control" multiple accept="image/*,video/*">
						<label>(File size should be max 2mb)</label>
					</div>

					<div class="form-group"> 
						{{Form::label('body', 'Add an Image')}}
						<input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="2097152" />
						<input type="file" onchange="upload_check()" id="file_id" name="image" class="form-control" multiple accept="image/*,video/*">
						<label>(File size should be max 2mb)</label>
					</div>

					<div class="form-group"> 
						{{Form::label('body', 'Add an Image')}}
						<input id="max_id" type="hidden" name="MAX_FILE_SIZE" value="2097152" />
						<input type="file" onchange="upload_check()" id="file_id" name="image" class="form-control" multiple accept="image/*,video/*">
						<label>(File size should be max 2mb)</label>
					</div>

					{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  

					{!! Form::close() !!}
					
				</div> 
			</div>
		</div>
	</div>
	@endsection
