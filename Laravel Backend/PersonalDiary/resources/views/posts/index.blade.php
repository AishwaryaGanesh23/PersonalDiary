@extends('layouts.pagelayout')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/home">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">All Posts</li>
  </ol>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('All Posts') }}
                    <a href="" style="float:right"><i class="fa fa-plus"></i></a>
                </div>
                <a href = "/posts">
                    Sort by Date Created
                </a>
                <a href = "/postsSortbyTitle">
                    Sort by Title
                </a>
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
