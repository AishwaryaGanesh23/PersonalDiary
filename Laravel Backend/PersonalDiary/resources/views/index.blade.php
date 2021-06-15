@extends('layouts.pagelayout')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="left: -1%;">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; " >{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

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
