@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <a href="/home"  class="breadcrumb-item">Home</a>
    <a class="breadcrumb-item active" aria-current="page">All Posts</a>
  </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 20px; font-family: 'Playfair Display', serif;">
                {{ __('All Posts') }}
                    <a href="/posts/create" style="float:right; font-size: 13px;"><i class="fa fa-plus"></i></a>
                    <a class="side_accordian" style="float:right; padding-right:10px; font-size: 13px;"><i class="fa fa-sort"></i>&nbsp;Sort</a>
                        <div class="acc_disp" style="text-align: right; font-size: 13px;">
                            <a href = "/posts">Sort by Date Created</a> <br>
                            <a href = "/postsSortbyTitle">Sort by Title</a> 
                        </div>             
                </div>
                
                <div class="card-body">
                    @if(count($posts)>1)
                        @foreach( $posts as $post)
                            @if(Auth::user()->id ==  $post->user_id)
                                <div class = "card-body">
                                    <h3 class="card-title">
                                        <a href = "/posts/{{$post->id}}">
                                            {{$post->title}}
                                        </a>
                                    </h3>
                                    <small class="card-text">Updated on {{$post->updated_at}}</small>
                                </div>
                            @endif  
                        @endforeach
                    @else
                    <div class = "card-body">
                                    <h3 class="card-title">
                                        You Have No Posts. Create One now!
                                    </h3>
                                    <!-- add new post button -->
                                    <center>
                                        <a href="">
                                        
                                        <button class="submits log-in btn btn-primary "><i class="fa fa-plus"></i> &nbsp;Create Post</button></a> 
                                    </center>
                                </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
