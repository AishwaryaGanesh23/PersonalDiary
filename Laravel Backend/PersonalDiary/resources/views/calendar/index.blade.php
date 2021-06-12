@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/posts" class="breadcrumb-item active" aria-current="page">Calendar</a>
</ol>
</nav>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{ __('Calendar') }}
                </div>
                                
                <!-- <div class="row" style="background: red;"> -->
				<!-- <div class="col-md-12" style="background: red;"> -->
				<div class="content w-100">
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

				    <div class="events-container">
                        
                    </div>

				    <div class="dialog" id="dialog">
				        
                         {!! Form::open(['action' => 'App\Http\Controllers\gCalendarController@store', 'method' => 'POST', 'id' => 'form', 'class' => 'createform', 'style' => 'font-size: 15px'] )!!} 
				            {{-- <form class="form" id="form"> --}}
				                <div class="form-container" align="center">
                                    <h2 class="dialog-header"> Add New Event </h2>

                                    <label class="form-label" id="valueFromMyButton" for="name" required>Event Name</label>
                                    <input class="input" type="text" id="name" name='name'>

                                    <label class="form-label" id="valueFromMyButton" for="starttime" required>Start Time</label>
                                    <input class="input" type="datetime-local" id="start"  name='start_time'>

                                    <label class="form-label" id="valueFromMyButton" for="endtime" required>End Time</label>
                                    <input class="input" type="datetime-local" id="end"  name='end_time'> 

                                    <input type="button" value="Cancel" class="button " id="cancel-button">
                                    <button class="button button-white" id="ok-button" type="submit">OK</button>
                                    <!-- <input type="button" value="OK" class="button button-white" id="ok-button"> -->
				                </div>
				            {{-- </form> --}}
                        {!! Form::close() !!}
				    </div>
				  <!-- </div> -->
				<!-- </div> -->
			    </div>
            </div>
            <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{ __('Todays Events ') }}
                </div>
                <div class="card-body">
                    @foreach( $events as $event)
                        @if(substr($event['start']['dateTime'],0,10) == date('Y-m-d'))
                            <div class = "card-body">
                                <h3 class="card-title">
                                    <a href = "/event/{{$event->id}}">
                                        {{$event->summary}}
                                    </a>
                                </h3>
                            </div>
                        @endif
                    @endforeach
                    </div>
            </div>

            <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{ __('All Events') }}
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

                                            	<small class="card-text">Starts on {{$event['start']['dateTime']}}</small>
                                            </div>
                                            {{-- @endif   --}}
                                        @endforeach
                                    @else
                                        <div class = "card-body">
                                            <h3 class="card-title">You Have No Events. Create One now!</h3>
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
