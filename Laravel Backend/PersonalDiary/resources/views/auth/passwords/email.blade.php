@extends('layouts.pagelayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card" style="left: 3vw;">
                <div class="card-header" style="font-size: 25px; font-family: 'Playfair Display', serif; text-align: center;">{{ __('Reset Password') }}</div>

                <!-- <div class="card-body"> -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="createform" method="POST" action="{{ route('password.email') }}" style="min-height: 100px; ">
                        @csrf

                        <div class="form-group row">
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

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="width: 150px">
                                    {{ __('Send') }}
                                </button>
                            </div>
                        </div>
                    </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection
