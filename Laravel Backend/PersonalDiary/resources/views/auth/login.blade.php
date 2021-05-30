@extends('layouts.pagelayout')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card"> -->
                <!-- <div class="card-header">{{ __('Login') }}</div> -->

                <!-- <div class="card-body"> -->
                    <form class="form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="container">
                     
                            <header class="head-form">
                                <h2>Log In</h2>
                            </header> <br>
                     

                            <div class="field-set">
                                
                                <div class="form-group">
                                    <span class="input-item">
                                         <i class="fa fa-user-circle"></i>&nbsp;{{ __('User ID') }}
                                    </span>
                              
                                    
                                    <!-- <input class="form-input" id="email" type="text" placeholder="User Id" required> -->
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    
                                    @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                

                            <!-- <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            -->
                        
                     
                            
                            <div class="form-group">
                                <span class="input-item">
                                    <i class="fa fa-key"></i>  {{ __('Password') }}
                                </span>
                                
                                <!-- <input class="form-input" type="password" placeholder="Password" id="password"  name="password" required> -->
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            
                            <!--<div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            -->

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                <!-- <button class="submits log-in"> LOGIN </button> -->
                                    <button type="submit" class="submits btn btn-primary log-in">
                                        {{ __('Login') }}
                                    </button> 


                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>  
                    </form>
                <!-- </div>
            </div> -->
        </div>
    </div>
</div>
@endsection
