@extends('layouts.pagelayout')

@section('content')


<div class="container cont-left">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif;" >{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col md-5">
                            <a href="{{ route('posts.index') }}">
                                <div class="col md-6">
                                    <p style="font-size: 20px">{{ __('All Posts') }}</p>
                                </div>
                                <img class="img-fluid rounded" src ="{{asset('pics/posts1.jpg')}}"> 
                                <br>
                                
                            </a>
                        </div>

                        <div class="col md-5">
                            <a href="{{ route('tasks.index') }}">
                                <div class="col md-6">
                                    <p style="font-size: 20px"> {{ __('To Do List') }}</p>
                                </div>
                                <img class="img-fluid rounded" src="{{asset('pics/todolist1.jpg')}}">
                                
                            </a>
                        </div>

                        <div class="col md-5">
                            <a href="{{ route('calendar.index') }}">
                                <div class="col md-6">
                                    <p style="font-size: 20px"> {{ __('Calendar Events') }}</p>
                                </div>
                                <img class="img-fluid rounded" src="{{asset('pics/cal.jpg')}}">
                                
                            </a>
                        </div>
                    </div> 
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
