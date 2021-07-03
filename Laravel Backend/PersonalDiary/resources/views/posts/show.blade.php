@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/posts" class="breadcrumb-item">Posts</a>
    <a class="breadcrumb-item active" aria-current="page">{{$post->title}}</a>
@endsection

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="font-size:30px; font-family: 'Playfair Display', serif;">
                    {{-- {{ __('Your Post') }} --}}
                    {{$post->title}} 
                    <a class="side_accordian" style="float:right; font-size: 18px; width: 20px; text-align: right"><i class="fa fa-ellipsis-v"></i></a>
                        <div class="acc_disp" style="text-align: right; font-size: 13px;">
                            <a href = "/posts/{{ $post->id }}/edit" style=" margin-right: 10px;">Edit</a> <br>
                            <!-- <a href = "/postssortbyCreated" style=" margin-right: 10px;">Delete</a> <br> -->
                            {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id], 'method' => 'DELETE', 'style' => 'background: transparent']) !!}
                                <button type="submit" style="background-color: transparent; border: transparent;">Delete Post</button>
                                <!-- {{Form::submit('Delete'), ['style' => 'background-color: transparent;'] }} -->
                            {!! Form::close() !!}
                        </div> 
                </div>

                <div class="card-body">
                    <small class="card-subtitle ">Created on {{$post->created_at}}</small>
                    <small class="card-subtitle ">Updated on {{$post->updated_at}}</small>
                    
                    <pre  class="card-text" style="width: 100%;white-space: pre-wrap;">{{$post->entrycontent}}</pre>

                    <div class="row" >
                        <!-- <div class="col-md-12">
                            @foreach($postmedia as $media)
                                @if($media->filetype == 'image')
                                    <img class="images" style="Padding-bottom: 20px" src ="{{asset('post_media/'.$media->filename)}}">
                                @elseif($media->filetype == 'video')
                                    <video width="100%" height="300px" controls>
                                        <source  src="{{URL::asset('post_media/'.$media->filename)}}" type="video/mp4" >
                                    Your browser does not support the video tag.
                                </video>
                                @endif
                            @endforeach
                        </div> -->
                        @if(count($postmedia)>0)
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="false" style="width:100%;height:360px;">
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
                                            <img  height="350" width="60%" src="{{asset('post_media/'.$media->filename)}}" data-toggle="modal" data-target="#exampleModal">
                                        
                                            
                                        @elseif($media->filetype == 'video')
                                            <video width="100%" height="350" controls>
                                                <source  src="{{URL::asset('post_media/'.$media->filename)}}" type="video/mp4" >
                                            Your browser does not support the video tag.
                                        </video>
                                        @endif
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

                        
                        @endif
                    </div>


                </div> 
                    <br>
                    <!-- <a href="/posts/{{ $post->id }}/edit" style="background-color: blue; width: 100px"><button class="btn btn-primary" style="float:left; margin-right: 5px; margin-left: 5px;"> Edit </button></a>
                    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id], 'method' => 'DELETE', 'style' => 'float: left; width: 50px; background-color: blue;']) !!}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])  }}
                    {!! Form::close() !!} -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
