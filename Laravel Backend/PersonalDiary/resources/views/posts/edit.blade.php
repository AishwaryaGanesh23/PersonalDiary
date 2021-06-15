@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/posts" class="breadcrumb-item">All Posts</a>
    <a href="/posts/{{$post->id}}" class="breadcrumb-item" aria-current="page">{{$post->title}}</a>
    <a class="breadcrumb-item active" aria-current="page">Edit Post</a>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
					        {{ __('Edit Your Post') }}

                  <a href="/posts/{{$post->id}}" style="float:right; font-size: 13px; "><i class="fa fa-close"></i></a>

                  @if(count($postmedia)>0)
                    <a onclick="openForm()" style="float:right; font-size: 13px; margin-right: 10px; cursor: pointer"><i class="fa fa-edit"></i> Edit Media</a>
                  @endif
				        </div>
                
                <!-- <div class="card-body"> -->
                <div class="blur" id="blur"></div> 

                {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update',$post->id], 'method' => 'PUT', 'class' => 'createform','enctype' => 'multipart/form-data', 'style' => 'border-bottom: transparent']) !!}
                  <div class="form-group"> 
                    {{Form::label('title', 'Enter a Title')}}
                    {{Form::text('title', $post->title, ['class' => 'form-control'])}}
                  </div>

                  <div class="form-group"> 
                    {{Form::label('body', 'Diary Entry')}}
                    {{Form::textarea('body', $post->entrycontent, ['class' => 'form-control'])}}
                  </div>
                  {{-- ask if they want to add media, if yes then show this --}}
                  <div class="form-group">
                    <input  type="checkbox" id="checkmedia"  onclick="ShowHideMedia(this)">
                    <label id="valueFromMyButton" >Add more Pictures/Videos to your post</label>
                  </div>

					
                  <div class="form-group" id="media" style="display: none"> 
                    {{Form::label('post_media_title', 'Add Images/Video')}}
                    {{ Form::hidden('MAX_FILE_SIZE', '2097152', ['id' => 'max_id']) }}
                    {{Form::file('post_media[]',['class' => 'form-control', 'id'=>'file_id', 'multiple' => 'multiple', 'accept'=>'image/*,video/*',  'onchange'=>'upload_check()'])}}
                    {{Form::label('post_media_warn', '(File size should be max 2mb)')}}
                  </div>
                  
                  {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  

                {!! Form::close() !!}
                <!-- </div> -->

                {{-- showing media that is already there --}}
                <div class="editmedia" id="myForm">
                  <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center; background: #fff"> 
                    Delete Media 
                  <a onclick="closeForm()" style="float:right; font-size: 13px; "><i class="fa fa-close"></i></a>
                  </div>
					
						      @foreach($postmedia as $media)
						
						        @if($media->filetype == 'image')
							        <img src ="{{asset('post_media/'.$media->filename)}}">

						        @elseif($media->filetype == 'video')
                      <video width="100%" height="300px" controls>
                        <source src="{{URL::asset('post_media/'.$media->filename)}}" type="video/mp4">
                        Your browser does not support the video tag.
                      </video>
						        @endif

						        {{-- add delete button --}}
						        {{-- <a href="{{ action('App\Http\Controllers\PostMediaController@destroy' , $media->id)}}"><button class="btn btn-danger" style="float:left; margin-right: 5px; "> Delete </button></a> --}}
						        {!! Form::open(['action' => ['App\Http\Controllers\PostMediaController@destroy',$media->id], 'method' => 'DELETE']) !!}
							          {{Form::submit('Delete',['class'=>'btn btn-danger', 'style' => 'margin-left: 25%;'])  }}
						        {!! Form::close() !!}
                    <br>
						      @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection