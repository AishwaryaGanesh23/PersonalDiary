@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/calendar" class="breadcrumb-item">Calendar</a>
    <a href="" class="breadcrumb-item active">All Events</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{ __('All Events') }}
                </div>

                <div class="card-body">
                    {{-- {{$date}} --}}
                    @if(count($events)>0)
                        @foreach( $events as $event)
                            {{-- @if(Auth::user()->id ==  $post->user_id) --}}
                                <div class = "card-body">
                                    <h3 class="card-title">
                                        <a href = "/calendar/{{$event->id}}">
                                            {{$event->summary}}
                                        </a>
                                    </h3>

                                    <small class="card-text">Date {{substr($event['start']['dateTime'],0,10)}}</small>
                                    <small class="card-text">Time {{substr($event['start']['dateTime'],11,5).' - '.substr($event['end']['dateTime'],11,5)}}</small>
                                </div>
                            {{-- @endif   --}}
                        @endforeach    
                        
                        @else
                            <div class = "card-body">
                                <h3 class="card-title">You Have No Events.</h3>
                                    <!-- add new post button -->
                                    <center>
                                        <a href="/posts/create">
                                        <button class="submits log-in btn btn-primary "><i class="fa fa-plus"></i> &nbsp;Create Event</button></a> 
                                    </center>
                            </div>
                        @endif
                    {{-- <a href="/calendar/{{$event->id}}/edit"><button class="btn btn-primary" style="float:left; margin-right: 5px; "> Edit </button></a> --}}
                    {!! Form::open(['action' => ['App\Http\Controllers\gCalendarController@destroy',$event->id], 'method' => 'DELETE', 'style' => 'float: left']) !!}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])  }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection