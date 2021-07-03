@extends('layouts.pagelayout')

@section('content')
<div class="container " >
    <div class="row justify-content-center">
        <div class="col-md-6">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <header class="head-form">
                                <h2>Log In</h2>
                            </header>

                        <div class="container">
                            <div class="field-set">
                                
                                <div class="form-group">
                                    <span class="input-item">
                                         <i class="fa fa-user-circle"></i>&nbsp;{{ __('User ID') }}
                                    </span>
                              
                                    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    
                                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                

                            
                            <div class="form-group">
                                <span class="input-item">
                                    <i class="fa fa-key"></i>  {{ __('Password') }}
                                </span>
                                
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            
                            
                            <center>
                            <div class="form-group row">
                                <div class="col-md-10 offset-md-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-10 offset-md-1">
                                    <button type="submit" class="submits btn btn-primary log-in">
                                        {{ __('Login') }}
                                    </button>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div> </center>
                        </div>  
                    </form>
        </div>
    </div>
</div>
@endsection
