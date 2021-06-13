@extends('layouts.pagelayout')

@include('layouts.sidebar')
@include('calendar.TodaysEvents')
@include('calendar.AllEvents')


@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/posts" class="breadcrumb-item active" aria-current="page">Calendar</a>
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

				            <button class="button" id="add-button" style="width: 150px;">Add Event</button>
				        </div>
				    </div>

				    <!-- <div class="events-container">
                        
                    </div> -->

				    <div class="dialog" id="dialog">
				        
                         {!! Form::open(['action' => 'App\Http\Controllers\gCalendarController@store', 'method' => 'POST', 'id' => 'form', 'class' => 'createform', 'style' => 'font-size: 15px'] )!!} 
				            {{-- <form class="form" id="form"> --}}
				                <div class="form-container" align="center">
                                    <h2 class="dialog-header"> Add New Event </h2>
                                    {{ date("Y-m-d T") }} <br> <br>
                                    <label class="form-label" id="valueFromMyButton" for="name" >Event Name</label>
                                    <input class="input" type="text" id="name" name='name' required>

                                    <label class="form-label" id="valueFromMyButton" for="starttime" >Start Time</label>
                                    <input class="input" type="time" id="start"  name='start_time'>

                                    <label class="form-label" id="valueFromMyButton" for="endtime" >End Time</label>
                                    <input class="input" type="time" id="end"  name='end_time'> 

                                    <input type="button" value="Cancel" class="button " id="cancel-button">
                                    <button class="button button-white" id="ok-button" type="submit">OK</button>
                                    <!-- <input type="button" value="OK" class="button button-white" id="ok-button"> -->
				                </div>
				            {{-- </form> --}}
                        {!! Form::close() !!}
				    </div>
				  <!-- </div> -->
				<!-- </div> -->
			    <!-- </div> -->
            </div>

            <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; ">
                    {{ __('Events') }}
                </div>
                    <div class="tab">
                        <button class="tablinks" onclick="openList(event, 'Today')" id="defaultOpen">Today's Event</button>
                        <button class="tablinks" onclick="openList(event, 'All')">All Events</button>
                    </div>
                    <!-- Tab content -->
                    <div id="Today" class="tabcontent">
                        @yield('TodaysEvents')
                    </div>
                    
                    <div id="All" class="tabcontent">
                        @yield('AllEvents')
                    </div>

                </div>
            </div>  
        </div>
    </div>
</div>
<script>
    function openList(evt, ListName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(ListName).style.display = "block";
  evt.currentTarget.className += " active";
}
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();

    </script>
@endsection
