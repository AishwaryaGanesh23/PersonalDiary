	@extends('layouts.pagelayout')

	@include('layouts.sidebar')

	
@section('breadcrumb')
	<a href="/home" class="breadcrumb-item">Home</a>
	<a href="/posts" class="breadcrumb-item">Posts</a>
	<a class="breadcrumb-item active" aria-current="page">Create a Post</a>
@endsection

	
	@section('content')
	
	<div class="container">
		<div class="row justify-content-center" >
			<div class="col-md-10">
				<div class="card">
					<div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif;">
						{{ __('Create a Post') }}
					</div>
					
					<!-- <div class="card-body"> -->
					
					{!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'class' => 'createform', 'enctype' => 'multipart/form-data']) !!}
					
					<div class="form-group"> 
						{{Form::label('title', 'Enter a Title')}}
						{{Form::text('title', '', ['class' => 'form-control' , 'placeholder' => 'Entry Title'])}}
					</div>

					<div class="form-group"> 
						{{Form::label('body', 'Diary Entry')}}
						{{Form::textarea('body', '', ['class' => 'form-control' , 'placeholder' => 'Type in your thoughts here'])}}
					</div>

					<div class="form-group">
						<input  type="checkbox" id="checkmedia"  onclick="ShowHideMedia(this)">
						<label id="valueFromMyButton" >Add Pictures/Videos</label>
					</div>

					<div class="form-group" id="media" style="display: none"> 
						{{Form::label('post_media_title', 'Add Images/Video')}}
						{{ Form::hidden('MAX_FILE_SIZE', '8388608', ['id' => 'max_id']) }}
						{{Form::file('post_media[]',['class' => 'form-control', 'id'=>'file_id', 'multiple' => 'multiple', 'accept'=>'image/*,video/*',  'onchange'=>'upload_check()'])}}
						{{Form::label('post_media_warn', '(File size should be max 8mb)')}}

					</div>

					{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  

					{!! Form::close() !!}
					
				</div> 
			</div>
		</div>
	</div>
	@endsection
