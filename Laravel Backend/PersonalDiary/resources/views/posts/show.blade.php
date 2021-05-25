@extends('layouts.pagelayout')

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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
