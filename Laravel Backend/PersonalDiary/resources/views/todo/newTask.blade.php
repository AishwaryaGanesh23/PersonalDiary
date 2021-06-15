	@extends('layouts.pagelayout')

	@include('layouts.sidebar')

	@section('breadcrumb')
		<a href="/home" class="breadcrumb-item">Home</a>
		<a href="/tasks" class="breadcrumb-item">Tasks</a>
		<a class="breadcrumb-item active" aria-current="page">New Task</a>
	@endsection

	@section('content')
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card">
					<div class="card-header" style="font-size: 25px; font-family: 'Playfair Display', serif;">
						{{ __('New Tasks') }}
					</div>
					
					<!-- <div class="card-body"> -->
					{!! Form::open(['action' => 'App\Http\Controllers\TasksController@store', 'method' => 'POST', 'class' => 'createform', 'style' => 'font-size: 15px'] )!!}
					<!-- <header class="head-form" >
						<h2>Create Your Post</h2>
					</header> -->
					<div class="form-group"> 
						{{Form::label('title', 'Task Name: ')}}
						{{Form::text('title', '', ['class' => 'form-control' , 'placeholder' => 'Task Title','required' => 'required'])}}
					</div>

					<div class="form-group"> 
						{{Form::label('desc', 'Task Description')}}
						{{Form::textarea('desc', '', ['class' => 'form-control' , 'placeholder' => 'Task Description'])}}
					</div>

					<div class="form-group"> 
						{{Form::label('duedate', 'Due Date')}}
						{!! Form::date('duedate', \Carbon\Carbon::today(), ['class' => 'form-control' , 'placeholder' => 'Date','required' => 'required']) !!}
					</div>

					<div class="form-group"> 
						{{Form::label('time', 'Due Time')}}
						{!! Form::time('duetime', \Carbon\Carbon::now(), ['class' => 'form-control' , 'placeholder' => 'Date']) !!}
					</div>

					<div class="form-group">
						{!! Form::checkbox('status', 'complete')!!}
						{{Form::label('status', 'Completed')}}
						
					</div>

					{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  

					{!! Form::close() !!}
				</div> 
			</div>
		</div>
	</div>
	@endsection
