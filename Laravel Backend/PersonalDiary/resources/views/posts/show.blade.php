@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item"><a href="/posts">All Posts</a></li>
   <li class="breadcrumb-item active" aria-current="page">{{$post->title}}</li>
   
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
                    {{$post->entrycontent}}
                    </p>

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
