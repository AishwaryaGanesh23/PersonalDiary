@extends('layouts.pagelayout')

@include('layouts.sidebar')
@include('calendar.TodaysEvents')
@include('calendar.AllEvents')
@include('calendar.upcoming')
@include('calendar.completed')
@include('calendar.ongoing')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a  class="breadcrumb-item active" aria-current="page">Calendar</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; ">
                    {{ __('Calendar') }}
                    {{-- <a class="side_accordian" style="float:right; padding-right:10px; font-size: 15px;"><i class="fa fa-chevron-circle-down"></i>&nbsp;View</a>
                        <div class="acc_disp" style="text-align: right; font-size: 13px;">
                            <a href = "calendar/eventsToday">Today's Events</a> <br>
                            <a href = "calendar/allEvents">All Events</a> 
                        </div> --}}
                </div>
                                
                <!-- <div class="row" style="background: red;"> -->
				<!-- <div class="col-md-12" style="background: red;"> -->
				<!-- <div class="content w-100"> -->
				    <div class="calendar-container">
				        <div class="calendar"> 
                            <div class="year-header"> 
                                <i class="left-button fa fa-chevron-left" id="prev"> </i> 
                                <span class="year" id="label" style="position: relative; top: -2vh;"></span> 
                                <i class="right-button fa fa-chevron-right" id="next"> </i>
                            </div> 

                            <table class="months-table"> 
                            <tbody>
                                <tr class="months-row">
                                    <td class="month">Jan</td> 
                                    <td class="month">Feb</td> 
                                    <td class="month">Mar</td> 
                                    <td class="month">Apr</td> 
                                    <td class="month">May</td> 
                                    <td class="month">Jun</td> 
                                    <td class="month">Jul</td>
                                    <td class="month">Aug</td> 
                                    <td class="month">Sep</td> 
                                    <td class="month">Oct</td>          
                                    <td class="month">Nov</td>
                                    <td class="month">Dec</td>
                                </tr>
                            </tbody>
                            </table> 
				        
                            <table class="days-table w-100"> 
                            <td class="day">Sun</td> 
                            <td class="day">Mon</td> 
                            <td class="day">Tue</td> 
                            <td class="day">Wed</td> 
                            <td class="day">Thu</td> 
                            <td class="day">Fri</td> 
                            <td class="day">Sat</td>
                            </table> 

                            <div class="frame"> 
                            <table class="dates-table w-100"> 
                                    <tbody class="tbody" style="border: 2px solid black;">             
                                    </tbody> 
                            </table>
                            </div> 

				            <button class="button" id="add-button" style="width: 150px;" data-toggle="modal" data-target="#myModal">Add Event</button>

                            <div class="modal fade dialog" id="myModal" role="dialog" style="height: 700px; width: 500px; top: -15vh">
    
                                <div class="modal-content" >
                                    <div class="modal-header" >
                                        <h5 class="modal-title">Add New Event</h5> {{ date("Y-m-d T") }} <br> <br>
                                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                    </div>
                                    
                                    <div class="form-container" align="center">
                                    {!! Form::open(['action' => 'App\Http\Controllers\gCalendarController@store', 'method' => 'POST', 'id' => 'form', 'class' => 'createform', 'style' => 'font-size: 15px'] )!!} 
                                        
                                        <!-- <h2 class="dialog-header"> Add New Event </h2> -->
                                            <div class="form-group">
                                                <label id="valueFromMyButton" for="name" >Event Name</label>
                                                <input class="form-control" type="text" id="name" name='name' required>
                                            </div>

                                            <div>
                                                <label for="startdate" id="lab_startdate">Start Date</label>
                                                <input class="form-control" type="date" id="startdate" name='startdate' value ="{{ date('Y-m-d') }}" required>
                                            </div>

                                            <div class="form-group" id="div3">
                                                <label id="lab_enddate" for="enddate" >End Date</label>
                                                <input class="form-control" type="date" id="enddate" name='enddate' min="{{ date('Y-m-d') }}">
                                            </div>

                                            <div class="form-group" style="display: block;" id="div1">
                                                <label id="lab_start_time" for="starttime" >Start Time</label>
                                                <input class="form-control" type="time" id="starttime"  name='start_time' value = "{{ date('h:00') }}">
                                            </div>

                                            <div class="form-group" style="display: block;" id="div2">
                                                <label id="lab_end_time" for="endtime" >End Time</label>
                                                <input class="form-control" type="time" id="endtime"  name='end_time' min="{{ date('h:00') }}"> 
                                            </div>

                                            <div class="form-group">
                                                <input  type="checkbox" id="checkfullday"  name='fullday' onclick="ShowHideDiv(this)">
                                                <label id="valueFromMyButton" for="fullday" >Full Day Event</label>
                                            </div>

                                            <button class="button" id="cancel-button"><a href="{{ route('calendar.index') }}" style="color:black">Cancel</a></button>
                                            <button class="button button-white" id="ok-button" type="submit">OK</button>
                                            
                                        
                                    {!! Form::close() !!}
                                    
                                    </div>
                                </div>
      

  
				        </div>


				        </div>
				    </div>

				    <!-- <div class="events-container">
                        
                    </div> -->

				    
				  <!-- </div> -->
				<!-- </div> -->
			    <!-- </div> -->
            </div>

            <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; ">
                    {{ __('Events') }}
                </div>
                    <div class="tab">
                        <button class="tablinks" onclick="openList(event, 'Completed')">Completed</button>
                        <button class="tablinks" onclick="openList(event, 'Today')" id="defaultOpen">Today</button>
                        <button class="tablinks" onclick="openList(event, 'OnGoing')">On Going</button>
                        <button class="tablinks" onclick="openList(event, 'Upcoming')">Upcoming</button>
                        <button class="tablinks" onclick="openList(event, 'All')">All Events</button>
                    </div>
                    <!-- Tab content -->
                    <div id="Completed" class="tabcontent">
                        @yield('Completed')
                    </div>
                    <div id="Today" class="tabcontent">
                        @yield('TodaysEvents')
                    </div>
                    <div id="OnGoing" class="tabcontent">
                        @yield('OnGoing')
                    </div>
                    <div id="Upcoming" class="tabcontent">
                        @yield('Upcoming')
                    </div>
                    <div id="All" class="tabcontent">
                        @yield('AllEvents')
                    </div>

                    
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
