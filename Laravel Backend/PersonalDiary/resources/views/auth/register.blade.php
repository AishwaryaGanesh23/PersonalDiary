@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card">
                <div class="card-header">{{ __('Register') }}</div> -->

                <!-- <div class="card-body"> -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="con">
                    
                        <header class="head-form">
                            <h2>Sign Up</h2>
                        </header>
                    

                        <div class="field-set">

                            <div class="form-group">
                                <span class="input-item">
                                    <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fa fa-user-o"></i> {{ __('Name') }}</label>
                                </span>
                                
                                <!-- <input class="form-input" id="firstname" type="text" placeholder="First Name" required onblur="chkefirstname()"> -->
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <!-- <div id="error1" style="color: red;"></div> -->
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->

                            <div class="form-group">
                                <span class="input-item">
                                    <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fa fa-at"></i> {{ __('E-Mail') }}</label>
                                </span>
                                
                                <!-- <input class="form-input" id="email" type="email" placeholder="Email Id" required onblur="chkeemail()"> -->
                                <!-- <div id="error3" style="color: red;"></div> -->
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->
                            
                            <div class="form-group">
                                <span class="input-item">
                                    <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fa fa-key"></i>{{ __('Password') }}</label>
                                </span>
                                
                                <!-- <input class="form-input" type="password" placeholder="Password" id="password"  name="password" required onblur="chkepass()">
                                <div id="error4" style="color: red;"></div> -->

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> -->
                        <div class="form-group">
                                <span class="input-item">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><i class="fa fa-key"></i>{{ __('Password') }}</label>
                                </span>
                                
                                <!-- <input class="form-input" type="password" placeholder="Password" id="password"  name="password" required onblur="chkepass()">
                                <div id="error4" style="color: red;"></div> -->

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                            </div>

                        <!-- <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> -->
                            
                            <!-- <button class="btn submits sign-up">Sign Up 
                                <i class="fa fa-user-plus" aria-hidden="true"></i>
                            </button> -->
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn submits sign-up">
                                    {{ __('Sign Up ') }}
                                    <i class="fa fa-user-plus" aria-hidden="true"></i> 
                                </button>
                            </div>
                            
                        
                        </div>
                    </div>
                        <!-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div> -->
                    </form>
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
