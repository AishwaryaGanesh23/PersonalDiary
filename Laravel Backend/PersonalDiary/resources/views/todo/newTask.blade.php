	@extends('layouts.pagelayout')

	@include('layouts.sidebar')

	@section('breadcrumb')
	<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/home">Home</a></li>
		<li class="breadcrumb-item"><a href="/tasks">To Do List</a></li>
		<li class="breadcrumb-item active" aria-current="page">New Task</li>
	</ol>
	</nav>
	@endsection

	@section('content')
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header" style="font-size: 25px; font-family: 'Playfair Display', serif;">
						{{ __('New Tasks') }}

						<a href="{{ route('tasks.index') }}" style="float:right; font-size: 13px;"><i class="fa fa-plus"></i></a>
						<a class="side_accordian" style="float:right; padding-right:10px; font-size: 13px;"><i class="fa fa-filter"></i>&nbsp;Filter</a>
						<div class="acc_disp" style="text-align: right; font-size: 13px;">
							Start Date: <input type="date" id="startdate" placeholder="Start Date">
							End Date: <input type="date" id="enddate" placeholder="End Date" >
						</div> 
					</div>
					
					<!-- <div class="card-body"> -->
					{!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'class' => 'createform', 'style' => 'font-size: 15px'] )!!}
					<!-- <header class="head-form" >
						<h2>Create Your Post</h2>
					</header> -->
					<div class="form-group"> 
						{{Form::label('title', 'Enter a Title')}}
						{{Form::text('title', '', ['class' => 'form-control' , 'placeholder' => 'Task Title'])}}
					</div>

					<div class="form-group"> 
						{{Form::label('title', 'Describe Task')}}
						{{Form::textarea('body', '', ['class' => 'form-control' , 'placeholder' => 'Task Description'])}}
					</div>

					<div class="form-group"> 
						{{Form::label('date', 'Start Date')}}
						{{Form::date('body', '', ['class' => 'form-control' , 'placeholder' => 'Start Date'])}}
					</div>

					{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  

					{!! Form::close() !!}
				</div> 
			</div>
		</div>
	</div>
	@endsection
