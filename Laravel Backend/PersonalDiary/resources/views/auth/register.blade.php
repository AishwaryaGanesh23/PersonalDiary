@extends('layouts.pagelayout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
                    <form class="form" method="POST" action="{{ route('register') }}">
                        @csrf

                        <header class="head-form">
                            <h2>Sign Up</h2>
                        </header>

                        <div class="container">
                            <div class="field-set">

                                <div class="form-group">
                                    <span class="input-item">
                                        <i class="fa fa-user-o"></i> {{ __('Name') }}
                                    </span>
                                    
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                

                                <div class="form-group">
                                    <span class="input-item">
                                        <i class="fa fa-at"></i> {{ __('E-Mail') }}
                                    </span>
                                    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                
                                <div class="form-group">
                                    <span class="input-item">
                                        <i class="fa fa-key"></i>{{ __('Password') }}
                                    </span>
                                    
                                    
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                
                                <div class="form-group">
                                    <span class="input-item"><i class="fa fa-key"></i>{{ __('Re-Enter Password') }}</span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    
                                </div>

                                <center>
                                    <div class="col-md-10 ">
                                        <button type="submit" class="btn submits sign-up">
                                            {{ __('Sign Up ') }}
                                            
                                        </button>
                                    </div>
                                </center>
                            </div>
                    </div>
                        
                    </form>
        </div>
    </div>
</div>
@endsection
