@extends('layouts.pagelayout')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" >
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a class="nav-link" href="{{ route('posts.index') }}">{{ __('All Posts') }}</a>
                    <a class="nav-link" href="{{ route('tasks.index') }}">{{ __('To Do List') }}</a>
                    <a class="nav-link" href="{{ route('calendar.index') }}">{{ __('Calendar') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
