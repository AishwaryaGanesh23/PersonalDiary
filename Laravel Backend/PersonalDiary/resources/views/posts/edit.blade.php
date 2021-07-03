@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/posts" class="breadcrumb-item">Posts</a>
    <a href="/posts/{{$post->id}}" class="breadcrumb-item" aria-current="page">{{$post->title}}</a>
    <a class="breadcrumb-item active" aria-current="page">Edit Post</a>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
           	<div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif;">
					        {{ __('Edit Post') }}

                  <a href="/posts/{{$post->id}}" style="float:right; font-size: 13px; "><i class="fa fa-close"></i></a>

                  @if(count($postmedia)>0)
                    <a data-toggle="modal" data-target="#modal2" style="float:right; font-size: 13px; margin-right: 10px; cursor: pointer"><i class="fa fa-edit"></i> Edit Media</a>
                  @endif
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
                  {{-- ask if they want to add media, if yes then show this --}}
                  <div class="form-group">
                    <input  type="checkbox" id="checkmedia"  onclick="ShowHideMedia(this)">
                    <label id="valueFromMyButton" >Add more Pictures/Videos to your post</label>
                  </div>

					
                  <div class="form-group" id="media" style="display: none"> 
                    {{Form::label('post_media_title', 'Add Images/Video')}}
                    {{ Form::hidden('MAX_FILE_SIZE', '8388608', ['id' => 'max_id']) }}
                    {{Form::file('post_media[]',['class' => 'form-control', 'id'=>'file_id', 'multiple' => 'multiple', 'accept'=>'image/*,video/*',  'onchange'=>'upload_check()'])}}
                    {{Form::label('post_media_warn', '(File size should be max 8mb)')}}
                  </div>
                  
                  {{Form::submit('OK', ['class' => 'btn btn-primary'])}}                  

                {!! Form::close() !!}
                <!-- </div> -->

                {{-- showing media that is already there --}}
                <div class="modal fade" id="modal2" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding: 20px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: whitesmoke">
                                <h5 class="modal-title" style="margin: auto; font-size:20px; font-family: 'Playfair Display', serif;">Update Profile</h5>
								<a  style="float:right; font-size: 13px; " data-dismiss="modal"><i class="fa fa-close"></i></a>
							</div>
					
						    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false" style="width:100%;height:400px;">
								<ol class="carousel-indicators">
									@foreach($postmedia as $media)
										<li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>      
									@endforeach
								</ol>

								<center>
								<div class="carousel-inner" role="listbox">
									@foreach($postmedia as $media)
										<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
											@if($media->filetype == 'image')
												<img  height="300" width="60%" src="{{asset('post_media/'.$media->filename)}}" data-toggle="modal" data-target="#exampleModal">
												
													
											@elseif($media->filetype == 'video')
												<video width="100%" height="300" controls>
													<source  src="{{URL::asset('post_media/'.$media->filename)}}" type="video/mp4" >
													Your browser does not support the video tag.
												</video>
											@endif

											{{-- add delete button --}}
											{!! Form::open(['action' => ['App\Http\Controllers\PostMediaController@destroy',$media->id], 'method' => 'DELETE']) !!}
												{{Form::submit('Delete',['class'=>'btn btn-danger', 'style' => 'margin-top: 20px; margin-bottom: 10px'])  }}
											{!! Form::close() !!}
										</div>
										
									@endforeach
								</div>
								
								</center> 
                            
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" style="height: 280px;">
									<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa fa-chevron-left" style="color: black; width: 50px;"></i></span>
									<span class="sr-only">Previous</span>
								</a>

								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" style="height: 280px">
									<span class="carousel-control-next-icon" aria-hidden="true"><i class="fa fa-chevron-right" style="color: black; width: 50px; "></i></span>
									<span class="sr-only">Next</span>
								</a>

								
                        	</div>
						</div>
                	</div>
            	</div>
        	</div>
		</div>
    </div>
</div>
@endsection