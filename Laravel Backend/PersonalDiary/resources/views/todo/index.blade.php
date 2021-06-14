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
                        
                        <div class="card">
                                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; ">
                                    {{ __('Your Tasks') }}
                                    <a href="{{ route('tasks.create') }}" style="float:right; font-size: 13px;"><i class="fa fa-plus"></i></a>
                                </div>
                                    <div class="tab">
                                        <button class="tablinks" onclick="openList(event, 'Overdue')" >Overdue</button>
                                        <button class="tablinks" onclick="openList(event, 'DueToday')" id="defaultOpen">Due Today</button>
                                        <button class="tablinks" onclick="openList(event, 'Upcoming')"> Upcoming</button>
                                        <button class="tablinks" onclick="openList(event, 'Completed')"> Completed</button>
                                        <button class="tablinks" onclick="openList(event, 'All')">All Tasks</button>
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

@endsection
