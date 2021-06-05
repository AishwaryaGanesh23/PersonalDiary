@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <!-- <a href="/home" class="breadcrumb-item">Home</a> -->
    <a href="/posts" class="breadcrumb-item active">My Profile</a>
   
  </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size:30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{ __('Profile') }}
                    
                </div>
                <div class="card-body">
                    {{-- if no pic --}}
                    @if(Auth::user()->profile_pic === null)
                    <img class="images " style="border: 2px solid black; border-radius: 50%; width: 150px; height: 150px;" src ="{{asset('pics/avtar.jpg')}}">
                    @else{{-- else if pic --}}
                    <img class="images " style="border: 2px solid black; border-radius: 50%; width: 150px; height: 150px;" src ="{{asset('profile_pic/'.Auth::user()->profile_pic)}}">
                    
                    {!! Form::open(['action' => ['App\Http\Controllers\ProfileController@destroy',Auth::user()->id], 'method' => 'DELETE', 'style' => 'float: left']) !!}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])  }}
                    {!! Form::close() !!}
                    
                    @endif
                    <label>{{ Auth::user()->name }}</label>

                    {!! Form::open(['action' => ['App\Http\Controllers\ProfileController@update',Auth::user()->id], 'method' => 'PUT', 'class' => 'createform','enctype' => 'multipart/form-data']) !!}
                    <div class="form-group"> 
                        {{Form::label('profile_pic_title', 'Change Profile Picture')}}
                        {{ Form::hidden('MAX_FILE_SIZE', '2097152', ['id' => 'max_id']) }}
                        {{Form::file('profile_pic',['class' => 'form-control', 'id'=>'file_id', 'accept'=>'image/*',  'onchange'=>'upload_check()'])}}
                        {{Form::label('profile_pic_warn', '(File size should be max 2mb)')}}
                    </div>
                    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
