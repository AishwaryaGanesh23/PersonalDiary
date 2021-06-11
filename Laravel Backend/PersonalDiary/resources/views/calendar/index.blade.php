@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('content')

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <a href="/home" class="breadcrumb-item">Home</a>
        <a href="/posts" class="breadcrumb-item active" aria-current="page">Calendar</a>
</ol>
</nav>
<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card">
                                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
                                        {{ __('Calendar') }}
                                        
                                </div>
                                
                                <div class="wrapper">
                                        <div class="container-calendar">
                                                <h3 id="monthAndYear"></h3>
                                                <div class="button-container-calendar">
                                                        <i class="fa fa-chevron-left" id="previous" onclick="previous()"></i>
                                                        <i class="fa fa-chevron-right" id="next" onclick="next()"></i>
                                                </div>
        
                                                <table class="table-calendar" id="calendar" data-lang="en">
                                                        <thead id="thead-month"></thead>
                                                        <tbody id="calendar-body"></tbody>
                                                </table>
        
                                                <div class="footer-container-calendar">
                                                        <label for="month">Jump To: </label>
                                                                <select id="month" onchange="jump()">
                                                                        <option value=0>Jan</option>
                                                                        <option value=1>Feb</option>
                                                                        <option value=2>Mar</option>
                                                                        <option value=3>Apr</option>
                                                                        <option value=4>May</option>
                                                                        <option value=5>Jun</option>
                                                                        <option value=6>Jul</option>
                                                                        <option value=7>Aug</option>
                                                                        <option value=8>Sep</option>
                                                                        <option value=9>Oct</option>
                                                                        <option value=10>Nov</option>
                                                                        <option value=11>Dec</option>
                                                                </select>

                                                                <select id="year" onchange="jump()"></select>       
                                                </div>

                                                <div class="footer-container-calendar"> 
                                                        <button id="add_task" class="btn btn-primary" style="width: 150px">
                                                                <a href="{{ route('calendar.create') }}">New Event</a>
                                                        </button>
                                                </div>
                                        </div>
                                </div>

                                <div class="card-body">
                                        {{-- {{$date}} --}}
                                        @if(count($events)>0)
                                            @foreach( $events as $event)
                                                {{-- @if(Auth::user()->id ==  $post->user_id) --}}
                                                    <div class = "card-body">
                                                        <h3 class="card-title">
                                                            <a href = "/event/{{$event->id}}">
                                                                {{$event->summary}}
                                                            </a>
                                                        </h3>
                                                        <small class="card-text">Updated on {{$event->updated}}</small>
                                                    </div>
                                                {{-- @endif   --}}
                                            @endforeach
                                        @else
                                        <div class = "card-body">
                                                        <h3 class="card-title">
                                                            You Have No Events. Create One now!
                                                        </h3>
                                                        <!-- add new post button -->
                                                        <center>
                                                            <a href="/posts/create">
                                                            
                                                            <button class="submits log-in btn btn-primary "><i class="fa fa-plus"></i> &nbsp;Create Event</button></a> 
                                                        </center>
                                                    </div>
                                        @endif
                                    </div>
                                 
                        </div> 
                </div>
        </div>
</div>

@endsection
