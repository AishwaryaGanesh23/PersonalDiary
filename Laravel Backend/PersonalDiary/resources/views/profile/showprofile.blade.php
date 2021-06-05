@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/posts" class="breadcrumb-item active">My Profile</a>
   
  </ol>
</nav>

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

                    <button class="change_profile" onclick="openForm()">Change Profile Picture</button> 

                    <div class="form-popup" id="myForm" >
                        <h3 style="font-weight: bold; padding-top:10px"> Change Profile Picture </h3>
                        <hr>
                        
                        <button type="submit" onclick="upload()">Upload</button>
                        <hr>
                        @if(Auth::user()->profile_pic !== null)
                        <button type="submit" onclick="deletePic()">Delete</button> 
                        <hr>
                        @endif
                        <button type="button" onclick="closeForm()" style="padding-bottom:10px">Close</button>
                        
                    </div>
                    <br>
                    
                    <p class="profile">{{ Auth::user()->name }}</p>
                    <div class="form-popup" id="myForm1">
                    {!! Form::open(['action' => ['App\Http\Controllers\ProfileController@update',Auth::user()->id], 'method' => 'PUT', 'class' => 'createform','enctype' => 'multipart/form-data']) !!}
                        
                        <div class="form-group" id="myForm"> 
                        
                            {{Form::label('profile_pic_title', 'Change Profile Picture')}}
                            {{ Form::hidden('MAX_FILE_SIZE', '8388608', ['id' => 'max_id']) }}
                            {{Form::file('profile_pic',['class' => 'form-control', 'id'=>'file_id', 'accept'=>'image/*',  'onchange'=>'upload_check()'])}}
                            {{Form::label('profile_pic_warn', '(File size should be max 8mb)')}} 
                        
                        </div>
                        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  
                        {!! Form::close() !!} 
                    </div>

                    <div class="form-popup" id="myForm2">
                    {!! Form::open(['action' => ['App\Http\Controllers\ProfileController@update',Auth::user()->id], 'method' => 'PUT', 'class' => 'deleteform','enctype' => 'multipart/form-data']) !!}
                        
                        <div class="form-group" id="myForm"> 
                            {{Form::label('profile_pic_title', 'Delete Profile Picture')}}
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
