@extends('layouts.pagelayout')

@include('layouts.sidebar')
@include('todo.Overdue')
@include('todo.DueToday')
@include('todo.Upcoming')
@include('todo.Completed')
@include('todo.AllTasks')

@section('breadcrumb')
        <a href="/home" class="breadcrumb-item">Home</a>
        <a class="breadcrumb-item active" aria-current="page">To Do List</a>
@endsection

@section('content')

<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-6">
                        {{-- <div class="card">
                                <div class="card-header" style="font-size: 25px; font-family: 'Playfair Display', serif;">
                                        {{ __('Your Tasks') }}

                                        <a href="{{ route('tasks.create') }}" style="float:right; font-size: 13px;"><i class="fa fa-plus"></i></a>
                                        <a class="side_accordian" style="float:right; padding-right:10px; font-size: 13px;"><i class="fa fa-filter"></i>&nbsp;Filter</a>
                                        <div class="acc_disp" style="text-align: right; font-size: 13px;">
                                                Start Date: <input type="date" id="startdate" placeholder="Start Date">
                                                End Date: <input type="date" id="enddate" placeholder="End Date" >
                                        </div>
                                        
                                </div>
                        </div>  --}}
                        <div class="card">
                                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; ">
                                    {{ __('Your Tasks') }}
                                </div>
                                    <div class="tab">
                                        <button class="tablinks" onclick="openList(event, 'Overdue')" >Overdue</button>
                                        <button class="tablinks" onclick="openList(event, 'DueToday')" id="defaultOpen">Due Today</button>
                                        <button class="tablinks" onclick="openList(event, 'Upcoming')"> Upcoming</button>
                                        <button class="tablinks" onclick="openList(event, 'Completed')"> Completed</button>
                                        <button class="tablinks" onclick="openList(event, 'All')">All Events</button>
                                    </div>
                                    <!-- Tab content -->
                                    <div id="Overdue" class="tabcontent">
                                        @yield('Overdue')
                                    </div>

                                    <div id="DueToday" class="tabcontent">
                                        @yield('DueToday')
                                    </div>

                                    <div id="Upcoming" class="tabcontent">
                                        @yield('Upcoming')
                                    </div>

                                    <div id="Completed" class="tabcontent">
                                        @yield('Completed')
                                    </div>

                                    <div id="All" class="tabcontent">
                                        @yield('All')
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
