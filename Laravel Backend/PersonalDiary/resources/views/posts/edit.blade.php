@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/posts" class="breadcrumb-item active">My Profile</a>
@endsection

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:30px; font-family: 'Playfair Display', serif; text-align: center; ">
                    {{ __('Profile') }}
                    
                </div>
                <div class="blur" id="blur"></div>
                <div class="card-body">
                    {{-- if no pic --}}
                    @if(Auth::user()->profile_pic === null)
                        <img class="dp" src ="{{asset('pics/avtar.jpg')}}">
                    @else{{-- else if pic --}}
                        <img class="dp" src ="{{asset('profile_pic/'.Auth::user()->profile_pic)}}">
                    @endif

                    

                    <div class="form-popup" id="myForm" >
                    
                        <h3 style="font-weight: bold; padding-top:10px"> Update Profile </h3>
                        
                        <hr>
                        
                        <button type="submit" onclick="upload()">Upload Picture</button>
                        <hr>
                        @if(Auth::user()->profile_pic !== null)
                        <button type="submit" onclick="deletePic()">Delete Picture</button> 
                        <hr>
                        @endif
                        <button type="button" onclick="password()" style="padding-bottom:10px">Change Password</button>
                        <hr>
                        <button type="button" onclick="closeForm()" style="padding-bottom:10px">Close</button>
                        
                    </div>
                    <br>
                    
                    <p class="profile">{{ Auth::user()->name }}</p>
                    <center>
                        <button class="btn btn-info" onclick="openForm()">Update Profile</button> 
                        <a class="btn btn-info" href="/oauth" role="button">OAuth</a>
                    </center>

                    <div class="form-popup" id="myForm1">
                    {!! Form::open(['action' => ['App\Http\Controllers\ProfileController@update',Auth::user()->id], 'method' => 'PUT', 'class' => 'createform','enctype' => 'multipart/form-data']) !!}
                    <button type="button" onclick="closeForm1()" style="float:right; font-size: 13px; width:10%;"><i class="fa fa-close"></i></button> 
                        <div class="form-group" id="myForm">
                            {{Form::label('profile_pic_title', 'Change Profile Picture', ['style' => 'font-weight: bold; font-size: 20px'])}}
                            {{ Form::hidden('MAX_FILE_SIZE', '8388608', ['id' => 'max_id']) }}
                            {{Form::file('profile_pic',['class' => 'form-control', 'id'=>'file_id', 'accept'=>'image/*',  'onchange'=>'upload_check()'])}}
                            {{Form::label('profile_pic_warn', '(File size should be max 8mb)')}} 
                        
                        </div>
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  
                        {!! Form::close() !!} 
                    </div>

                    <div class="form-popup" id="myForm3">
                    {!! Form::open(['action' => 'App\Http\Controllers\ProfileController@changePassword', 'method' => 'POST', 'class' => 'createform','enctype' => 'multipart/form-data']) !!}
                    <button type="button" onclick="closeForm3()" style="float:right; font-size: 13px; width:10%;"><i class="fa fa-close"></i></button> 
                        <div class="form-group" id="myForm3">
                            {{Form::label('change_password', 'Change Password', ['style' => 'font-weight: bold; font-size: 20px;'])}}
                            <br>
                            {{Form::label('current_password', 'Current Password')}}
						    {{Form::password('current_password', ['class' => 'form-control' , 'placeholder' => 'Enter your current password'])}}

                            {{Form::label('password', 'New Password')}}
						    {{Form::password('password',  ['class' => 'form-control' , 'placeholder' => 'Enter your new password'])}}

                            {{Form::label('password_confirmation', 'Confirm New Password')}}
						    {{Form::password('password_confirmation',  ['class' => 'form-control' , 'placeholder' => 'Confirm your new password'])}}
                        </div>
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  
                        {!! Form::close() !!} 
                    </div>

                    <div class="form-popup" id="myForm2">
                    {!! Form::open(['action' => ['App\Http\Controllers\ProfileController@update',Auth::user()->id], 'method' => 'PUT', 'class' => 'deleteform','enctype' => 'multipart/form-data']) !!}
                    <button type="button" onclick="closeForm2()" style="float:right; font-size: 13px; width:10%;"><i class="fa fa-close"></i></button>
                         
                        <div class="form-group" id="myForm">
                        
                            {{Form::label('profile_pic_title', 'Delete Profile Picture', ['style' => 'font-weight: bold; font-size: 20px'])}}
                        </div>
                        {!! Form::open(['action' => ['App\Http\Controllers\ProfileController@destroy',Auth::user()->id], 'method' => 'DELETE', 'style' => 'float: left']) !!}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])  }}
                        {!! Form::close() !!} 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
