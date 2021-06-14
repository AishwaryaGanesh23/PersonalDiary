@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/posts" class="breadcrumb-item">All Posts</a>
    <a class="breadcrumb-item active" aria-current="page">{{$post->title}}</a>
@endsection

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header" style="font-size:30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{-- {{ __('Your Post') }} --}}
                    {{$post->title}}  
                </div>
                <div class="card-body">

                    <small class="card-subtitle ">Created on {{$post->created_at}}</small>
                    <small class="card-subtitle ">Updated on {{$post->updated_at}}</small>
                    
                    <pre  class="card-text" style="width: 100%;white-space: pre-wrap; ">{{$post->entrycontent}}</pre>

                    <div class="row" >
                        <div class="col-md-12">
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
                        </div>
                    </div>


                    <a href="/posts/{{ $post->id }}/edit"><button class="btn btn-primary" style="float:left; margin-right: 5px; "> Edit </button></a>
                    <!-- <a href="/posts/{{ $post->id }}/edit"><button class="btn btn-primary" style="width: 80px; height: 40px;"> Edit </button></a> -->
                    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id], 'method' => 'DELETE', 'style' => 'float: left']) !!}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])  }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
