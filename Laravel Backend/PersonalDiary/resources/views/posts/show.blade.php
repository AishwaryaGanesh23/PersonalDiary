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
                <div class="card-body">
                    <h2 class="card-title">
                        {{$post->title}}                          
                    </h2>

                    <small class="card-subtitle ">Created on {{$post->created_at}}</small>
                    <small class="card-subtitle ">Updated on {{$post->updated_at}}</small>
                    
                    <p  class="card-text">
                    {{$post->entrycontent}}
                    </p>

                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>
                    {{-- <a href="/posts/{{ $post->id }}/delete" class="btn btn-default">Delete</a> --}}
                    {!! Form::open(['action' => ['App\Http\Controllers\PostsController@destroy',$post->id], 'method' => 'DELETE', 'class'=>'pull-right']) !!}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])  }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
