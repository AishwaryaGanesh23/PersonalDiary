@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/posts" class="breadcrumb-item">All Posts</a>
    <a href="/posts/{{$post->id}}" class="breadcrumb-item" aria-current="page">{{$post->title}}</a>
    <a class="breadcrumb-item active" aria-current="page">Edit Post</a>
  </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
					        {{ __('Edit Your Post') }}
				        </div>
                
                <!-- <div class="card-body"> -->
                
              {!! Form::open(['action' => ['App\Http\Controllers\PostsController@update',$post->id], 'method' => 'PUT', 'class' => 'createform','enctype' => 'multipart/form-data']) !!}
                  <div class="form-group"> 
                    {{Form::label('title', 'Enter a Title')}}
                    {{Form::text('title', $post->title, ['class' => 'form-control'])}}
                  </div>

                  <div class="form-group"> 
                    {{Form::label('body', 'Diary Entry')}}
                    {{Form::textarea('body', $post->entrycontent, ['class' => 'form-control'])}}
                  </div>

                  <div class="form-group"> 
                        @foreach($postmedia as $media)
                            @if($media->filetype == 'image')
                                <img class="images" style="Padding-bottom: 20px" src ="{{asset('post_media/'.$media->filename)}}">
                            @elseif($media->filetype == 'video')
                                <video width="100%" controls>
                                    <source src="{{URL::asset('post_media/'.$media->filename)}}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            @endif
                            {{-- add delete button --}}
                            {{-- {!! Form::open(['action' => ['App\Http\Controllers\PostsController@deletePostMedia',$media->id],'style' => 'float: right']) !!}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])  }}
                            {!! Form::close() !!} --}}
                        @endforeach
                </div>
                  {{-- ask if they want to add media, if yes then show this --}}
                  <div class="form-group"> 
                    {{Form::label('post_media_title', 'Add Images/Video')}}
                    {{ Form::hidden('MAX_FILE_SIZE', '2097152', ['id' => 'max_id']) }}
                    {{Form::file('post_media[]',['class' => 'form-control', 'id'=>'file_id', 'multiple' => 'multiple', 'accept'=>'image/*,video/*',  'onchange'=>'upload_check()'])}}
                    {{Form::label('post_media_warn', '(File size should be max 2mb)')}}
                  </div>
                  
                  {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  

                {!! Form::close() !!}
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection