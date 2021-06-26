@extends('layouts.pagelayout')

@include('layouts.sidebar')


@section('breadcrumb')
<a href="/home" class="breadcrumb-item">Home</a>
<a href="/calendar" class="breadcrumb-item">Calendar</a>
<a class="breadcrumb-item active" aria-current="page">Add New Event</a>
@endsection


@section('content')

<div class="container">
        <div class="row justify-content-center" >
                <div class="col-md-10">
                        <div class="card">
                                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
                                        {{ __('Add New Event') }}
                                </div>
                                
                                {!! Form::open(['action' => 'App\Http\Controllers\gCalendarController@store', 'method' => 'POST', 'id' => 'form', 'class' => 'createform', 'style' => 'font-size: 15px'] )!!} 
                                        
                                        <!-- <h2 class="dialog-header"> Add New Event </h2> -->
                                            <div class="form-group">
                                                <label id="valueFromMyButton" for="name" >Event Name</label>
                                                <input class="form-control" type="text" id="name" name='name' required>
                                            </div>
                                            

                                            <div class="form-group">
                                                <label for="startdate" id="lab_startdate">Start Date</label>
                                                <input class="form-control" type="date" id="startdate" name='startdate' value ="{{ date('Y-m-d') }}" required>
                                            </div>

                                            <div class="form-group" id="divedate">
                                                <label id="lab_enddate" for="enddate" >End Date</label>
                                                <input class="form-control" type="date" id="enddate" name='enddate' min="{{ date('Y-m-d') }}">
                                            </div>

                                            <div class="form-group" style="display: block;" id="divstime">
                                                <label id="lab_start_time" for="starttime" >Start Time</label>
                                                <input class="form-control" type="time" id="starttime"  name='start_time' value = "{{ date('h:00') }}">
                                            </div>
                                            

                                            <div class="form-group" style="display: block;" id="divetime">
                                                <label id="lab_end_time" for="endtime" >End Time</label>
                                                <input class="form-control" type="time" id="endtime"  name='end_time' min="{{ date('h:00') }}"> 
                                            </div>

                                            <div class="form-group">
                                                <input  type="checkbox" id="checkfullday"  name='fullday' onclick="ShowHideDiv(this)">
                                                <label id="valueFromMyButton" for="fullday" >Full Day Event</label>
                                            </div>

                                            <div class="form-group">
                                                <a href="{{ route('calendar.index') }}" class="btn btn-danger " id="cancel-button" style="padding-top: 13px">Cancel</a>
                                                <button class="btn btn-primary" id="ok-button" type="submit">Submit</button>
                                            </div>
                                        
                                    {!! Form::close() !!}
                                    
                                
                                
                                
                        </div> 
                </div>
        </div>
</div>
@endsection
