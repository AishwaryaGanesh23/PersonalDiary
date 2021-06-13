@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/calendar" class="breadcrumb-item">Calendar</a>
    <a href="" class="breadcrumb-item active">Today's Events</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="font-size: 30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{ __('Today's Events') }}
                </div>

                <div class="card-body">
                    @php
                        $flag =0;
                    @endphp

                    @if(count($events)>0)
                        @foreach( $events as $event)
                            @if($event['start']['dateTime']!= null)
                                @php
                                    $eventdate= substr($event['start']['dateTime'],0,10)
                                @endphp

                            @else
                                @php
                                    $eventdate= $event['start']['date']
                                @endphp
                            @endif

                            @if($eventdate == date('Y-m-d'))
                                <div class = "card-body">
                                    <h3 class="card-title">
                                        <a href = "/calendar/{{$event->id}}">
                                            {{$event->summary}}
                                        </a>
                                    </h3>
                                    <small class="card-text">Time {{substr($event['start']['dateTime'],11,5).' - '.substr($event['end']['dateTime'],11,5)}}</small>

                                </div>
                                @php
                                    $flag = 1;
                                @endphp
                            @endif
                            
                        @endforeach
                    @endif    
                    @if($flag==0)
                        <div class = "card-body">
                            <h3 class="card-title">
                                <h3 class="card-title">You Have No Events Today.</h3>
                                {{ date("Y-m-d H:i T") }}
                            </h3>
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