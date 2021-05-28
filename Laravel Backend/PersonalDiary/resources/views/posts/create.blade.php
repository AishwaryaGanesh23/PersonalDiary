@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item"><a href="/posts">All Posts</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create a Post</li>
  </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card"> -->
                <!-- <div class="card-header">{{ __('Create a Post') }}</div> -->
                
                <!-- <div class="card-body"> -->
                
                {!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST']) !!}
                  <div class="form-group"> 
                    {{Form::label('title', 'Enter a Title')}}
                    {{Form::text('title', '', ['class' => 'form-control' , 'placeholder' => 'Entry Title'])}}
                  </div>

                  <div class="form-group"> 
                    {{Form::label('body', 'Diary Entry')}}
                    {{Form::textarea('body', '', ['class' => 'form-control' , 'placeholder' => 'Type in your thoughts here'])}}
                  </div>

                  {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  

                {!! Form::close() !!}
                <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->
    </div>
</div>
@endsection
