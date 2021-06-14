@extends('layouts.pagelayout')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="left: -1%; top: 50px; width: 115%;">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- <a href="{{ route('posts.index') }}"><img class="index_image" src ="{{asset('pics/posts2.png')}}"></a>
                    <a href="{{ route('tasks.index') }}"><img class="index_image" src ="{{asset('pics/todo2.png')}}"></a>
                    <a href="{{ route('calendar.index') }}"><img class="index_image" src ="{{asset('pics/calendar1.png')}}"></a>
                    <br>
                    <a  href="{{ route('posts.index') }}" style="margin-left: 100px">{{ __('All Posts') }}</a>
                    <a  href="{{ route('tasks.index') }}" style="margin-left: 210px">{{ __('To Do List') }}</a>
                    <a  href="{{ route('calendar.index') }}" style="margin-left: 200px">{{ __('Calendar') }}</a> -->

                    <div id="div1" style="width: 30%; height: 250px;">
                        <a href="{{ route('posts.index') }}">
                            <img class="index_image" src ="{{asset('pics/posts4.png')}}"> 
                            <br>
                            <p > {{ __('All Posts') }}</p>
                        </a>
                    </div>

                   <div id="div2" style="width: 30%; height: 250px; position: absolute; left: 30%; top:10vh;">
                        <a href="{{ route('tasks.index') }}">
                            <img class="index_image" src ="{{asset('pics/todo1.png')}}">
                            <p> {{ __('To Do List') }}</p>
                        </a>
                    </div>

                    <div id="div3" style="width: 30%; height: 250px; position: absolute; left: 60%; top:10vh;">
                        <a href="{{ route('calendar.index') }}">
                            <img class="index_image" src ="{{asset('pics/calendar1.png')}}">
                            <p> {{ __('Calendar') }}</p>
                        </a>
                    </div> 
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
