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
                <div class="card-header">{{ __('All Posts') }}</div>

                <div class="card-body">
                    @if(count($posts)>1)
                        @foreach( $posts as $post)
                            @if(Auth::user()->id ==  $post->user_id)
                                <div class = "card-body">
                                    <h3 class="card-title">
                                        <a href = "/posts/{{$post->user_id}}-{{$post->id}}">
                                            {{$post->title}}
                                        </a>
                                    </h3>
                                    <small class="card-text">Updated on {{$post->updated_at}}</small>
                                </div>
                            @endif  
                        @endforeach
                    @else

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
