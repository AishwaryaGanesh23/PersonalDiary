@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a class="breadcrumb-item active">My Profile</a>
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


                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" style="margin: auto; font-size:30px; font-family: 'Playfair Display', serif;">Update Profile</h5>
                            </div>
                            <div class="modal-body">
                                {!! Form::open(['action' => ['App\Http\Controllers\ProfileController@update',Auth::user()->id], 'name'=>'uploadform', 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                                    {{ Form::hidden('MAX_FILE_SIZE', '8388608', ['id' => 'max_id']) }}
                                    {{Form::file('profile_pic',['id'=>'file_id', 'accept'=>'image/*',  'hidden', 'onchange'=>'upload_check()'])}}
                                    <label for="file_id" onchange="uploadform.submit()" style="margin-left: 42%">Upload Picture</label>              
                                {!! Form::close() !!} 

                                <hr>
                                @if(Auth::user()->profile_pic !== null)
                                {!! Form::open(['action' => ['App\Http\Controllers\ProfileController@update',Auth::user()->id], 'method' => 'PUT','enctype' => 'multipart/form-data', 'style' => 'background: transparent']) !!}
                                    
                                    {!! Form::open(['action' => ['App\Http\Controllers\ProfileController@destroy',Auth::user()->id], 'method' => 'DELETE']) !!}
                                    <button type="submit">Delete Picture</button>
                                {!! Form::close() !!}
                                <hr>
                                @endif
                                <a href="/changepasswordform"><button style="padding-bottom:10px">Change Password</button></a>
                                <hr>
                                <button data-dismiss="modal" style="padding-bottom:10px">Close</button>
                            </div>
                        
                        </div>
                    </div>
                    </div>

                    

                    
                    <br>
                    
                    <p class="profile">{{ Auth::user()->name }}</p>
                    <center>
                        <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Update Profile</button> 
                        <a class="btn btn-info" href="/oauth" role="button">OAuth</a>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
