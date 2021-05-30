	@extends('layouts.pagelayout')

	@include('layouts.sidebar')

	@section('content')
	<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="/home">Home</a></li>
		<li class="breadcrumb-item"><a href="/posts">To Do List</a></li>
		<li class="breadcrumb-item active" aria-current="page">New Task</li>
	</ol>
	</nav>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
						{{ __('New Task') }}
					</div>
					
					<!-- <div class="card-body"> -->
					
					{!! Form::open(['action' => 'App\Http\Controllers\PostsController@store', 'method' => 'POST', 'class' => 'createform']) !!}
					<!-- <header class="head-form" >
						<h2>Create Your Post</h2>
					</header> -->
					<div class="form-group"> 
						{{Form::label('title', 'Enter a Title')}}
						{{Form::text('title', '', ['class' => 'form-control' , 'placeholder' => 'Task Title'])}}
					</div>

					<div class="form-group"> 
						{{Form::label('date', 'Start Date')}}
						{{Form::date('body', '', ['class' => 'form-control' , 'placeholder' => 'Start Date'])}}
					</div>

					<div class="form-group"> 
						{{Form::label('date', 'Start Date')}}
						{{Form::date('body', '', ['class' => 'form-control' , 'placeholder' => 'End Date'])}}
					</div>

					{{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  

					{!! Form::close() !!}
					
				</div> 
			</div>
		</div>
	</div>
	@endsection
