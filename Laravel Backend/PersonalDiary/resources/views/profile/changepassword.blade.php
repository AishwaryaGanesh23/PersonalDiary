	@extends('layouts.pagelayout')

	@include('layouts.sidebar')

	
@section('breadcrumb')
	<a href="/home" class="breadcrumb-item">Home</a>
	<a href="{{ route('profile.index') }}" class="breadcrumb-item">My Profile</a>
	<a class="breadcrumb-item active" aria-current="page">Change Password</a>
@endsection

	
	@section('content')
	
	<div class="container">
		<div class="row justify-content-center" >
			<div class="col-md-10">
				<div class="card">
					<div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif;">
						{{ __('Change Password') }}
					</div>
					
					{!! Form::open(['action' => 'App\Http\Controllers\ProfileController@changePassword', 'method' => 'POST', 'class' => 'createform','enctype' => 'multipart/form-data']) !!}
						<div class="form-group">
							{{Form::label('current_password', 'Current Password')}}
							{{Form::password('current_password',['class' => 'form-control' , 'placeholder' => 'Enter your current password'])}}
						</div>

						<div class="form-group">
							{{Form::label('password', 'New Password')}}
							{{Form::password('password',  ['class' => 'form-control' , 'placeholder' => 'Enter your new password'])}}
						</div>

						<div class="form-group">
							{{Form::label('password_confirmation', 'Confirm New Password')}}
						    {{Form::password('password_confirmation',  ['class' => 'form-control' , 'placeholder' => 'Confirm your new password'])}}
						</div>
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}} 
						<a class="btn btn-danger" href="{{ route('profile.index') }}" role="button">Cancel</a>
						{!! Form::close() !!} 
				</div> 
			</div>
		</div>
	</div>
	@endsection
