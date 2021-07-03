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
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; ">
                    {{ __('Events') }}
                    <a href="/calendar/create" style="float:right; font-size: 13px;"><i class="fa fa-plus"></i></a>
                    <a data-toggle="modal" data-target="#modal3" style="float:right; font-size: 13px; cursor: pointer; margin-right:10px;"><i class="fa fa-calendar-o"></i>&nbsp;Calendar</a>    
                </div>
                                
                <div class="modal fade" id="modal3" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="margin: auto; font-size:30px; font-family: 'Playfair Display', serif;">Calendar</h5>
								<a  style="float:right; font-size: 13px; " data-dismiss="modal"><i class="fa fa-close"></i></a>
							</div>

                            <div class="calendar-container">
                                <div class="calendar" > 
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

                                    <a href="/calendar/create"><button class="button" id="add-button" style="width: 150px;">Add Event</button></a>

                                </div>
                            </div>
                        </div>
                    </div>
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
@endsection
