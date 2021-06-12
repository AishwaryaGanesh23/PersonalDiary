@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
<nav aria-label="breadcrumb">
<ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/home">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">To Do List</li>
</ol>
</nav>
@endsection

@section('content')

<div class="container">
        <div class="row justify-content-center">
                <div class="col-md-6">
                        <div class="card">
                                <div class="card-header" style="font-size: 25px; font-family: 'Playfair Display', serif;">
                                        {{ __('Your Tasks') }}

                                        <a href="{{ route('tasks.create') }}" style="float:right; font-size: 13px;"><i class="fa fa-plus"></i></a>
                                        <a class="side_accordian" style="float:right; padding-right:10px; font-size: 13px;"><i class="fa fa-filter"></i>&nbsp;Filter</a>
                                        <div class="acc_disp" style="text-align: right; font-size: 13px;">
                                                Start Date: <input type="date" id="startdate" placeholder="Start Date">
                                                End Date: <input type="date" id="enddate" placeholder="End Date" >
                                        </div> 
                                </div>
                                
                        </div> 
                </div>
        </div>
</div>
@endsection
