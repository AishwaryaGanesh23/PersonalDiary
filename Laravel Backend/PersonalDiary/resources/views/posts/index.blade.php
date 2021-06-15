@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home"  class="breadcrumb-item">Home</a>
    <a class="breadcrumb-item active" aria-current="page">Posts</a>
@endsection

@section('content')
@php
    $flag =0;
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="font-size: 25px; font-family: 'Playfair Display', serif;">
                {{ __('All Posts') }}
                    <a href="/posts/create" style="float:right; font-size: 13px;"><i class="fa fa-plus"></i></a>
                    <a class="side_accordian" style="float:right; padding-right:10px; font-size: 13px;"><i class="fa fa-chevron-circle-down"></i>&nbsp;Sort</a>
                        <div class="acc_disp" style="text-align: right; font-size: 13px;">
                            <a href = "/posts">Sort by Date Created Latest First</a> <br>
                            <a href = "/postssortbyCreated">Sort by Date Created Oldest First</a> <br>
                            <a href = "/postsSortbyTitle">Sort by Title</a> 
                        </div>             
                </div>
                
                <div class="card-body">
                    @if(count($posts)>=1)
                        @foreach( $posts as $post)
                            @if(Auth::user()->id ==  $post->user_id)
                            @php
                                $flag =1;
                            @endphp
                                <div class = "card-body">
                                    <h3 class="card-title">
                                        <a href = "/posts/{{$post->id}}">
                                            {{$post->title}}
                                        </a>
                                    </h3>
                                    <small class="card-text">Created on {{$post->created_at}}</small> <br> 
                                    <small class="card-text">Updated on {{$post->updated_at}}</small>
                                    <hr>
                                </div>
                            @endif  
                        @endforeach
                    @endif
                    @if($flag==0)
                    <div class = "card-body">
                        <h3 class="card-title">
                            You Have No Posts. Create One now! Press <i class="fa fa-plus"></i> on the top right corner of the card.
                        </h3>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
