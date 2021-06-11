@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('content')
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item"><a href="/calendarEvents">Calendar</a></li>
        <li class="breadcrumb-item active" aria-current="page">New Event</li>
</ol>
</nav>
<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                        <div class="card">
                                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
                                        {{ __('New Event') }}
                                </div>
                                
                                <!-- <div class="card-body"> -->
                                <center>
                                {!! Form::open(['action' => 'App\Http\Controllers\gCalendarController@store', 'method' => 'POST', 'class' => 'createform']) !!}
                                <!-- <header class="head-form" >
                                        <h2>Create Your Post</h2>
                                </header> -->
                                <div class="form-group"> 
                                        {{Form::label('title', 'Enter a Title')}}
                                        {{Form::text('title', '', ['class' => 'form-control' , 'placeholder' => 'Event Title'])}}
                                </div>

                                <div class="form-group"> 
                                        {{Form::label('date', 'Start Date')}}
                                        {{Form::date('start_date', '', ['class' => 'form-control' , 'value' => 'eventdate()'])}}
                                </div>

                                <div class="form-group"> 
                                        {{Form::label('date', 'End Date')}}
                                        {{Form::date('end_date', '', ['class' => 'form-control' , 'placeholder' => 'End Date'])}}
                                </div>

                                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  

                                {!! Form::close() !!}
                                </center>
                        </div> 
                </div>
        </div>
</div>
@endsection
