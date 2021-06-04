@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <!-- <a href="/home" class="breadcrumb-item">Home</a> -->
    <a href="/posts" class="breadcrumb-item active">My Profile</a>
   
  </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{ __('Profile') }}
                    <!-- {{$post->title}}   -->
                </div>
                <div class="card-body">
                    <img class="images " style="border: 2px solid black; border-radius: 50%; width: 150px; height: 150px;" src ="">
                    <label>{{ Auth::user()->name }}</label>

                    
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
