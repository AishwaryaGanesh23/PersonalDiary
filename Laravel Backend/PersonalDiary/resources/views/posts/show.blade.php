@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/posts" class="breadcrumb-item">All Posts</a>
   <a class="breadcrumb-item active" aria-current="page">{{$post->title}}</a>
   
  </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header" style="font-size:30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{ __('Your Post') }}
                </div>
                <div class="card-body">
                
                    <h2 class="card-title" style="font-weight: bold;">
                        {{$post->title}}                          
                    </h2>

                    <small class="card-subtitle ">Created on {{$post->created_at}}</small>
                    <small class="card-subtitle ">Updated on {{$post->updated_at}}</small>
                    
                    <p  class="card-text" style="width: 500px; ">
                    <pre>{{$post->entrycontent}}</pre>
                    </p>

                    <div class="row">
                        <div class="col-md-12">
                            @foreach($postmedia as $picture)
                                <img style="width: 100%" src ="{{asset('storage/post_media/'.$picture->filename)}}">
                            @endforeach
                        </div>
                    </div>


                    <a href="/posts/{{ $post->id }}/edit"><button class="btn btn-primary" style="float:left; margin-right: 2px"> Edit </button></a>
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
