@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/calendar" class="breadcrumb-item">All Events</a>
    <a class="breadcrumb-item active" aria-current="page">{{$event->summary}}</a>
@endsection

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header" style="font-size:30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{-- {{ __('Your Post') }} --}}
                    {{$event->summary}}  
                </div>
                <div class="card-body">
                    
                    <ol>
                        @if($event['start']['dateTime']!= null)
                            <li>Date: {{ substr($event['start']['dateTime'],0,10) }}</li>
                            <li>Starts at: {{substr($event['start']['dateTime'],11,5)}}</li>
                            <li>Ends at: {{substr($event['end']['dateTime'],11,5)}}</li>   
                        @else
                            <li>Date: {{ $event['start']['date'] }}</li>
                        @endif
                    </ol>    
                    <ol>
                        @if($event->hangoutLink!=null)
                            <li>Hangout link: <a href="{{ $event->hangoutLink }}">{{ $event->hangoutLink }}</a></li>
                        @endif
                        @if($event->location!=null)
                            <li>Location:{{ $event->location }}</li>
                        @endif
                    </ol>
                    
                    <ol>Organiser
                        @if($event['creator']['displayName']!=null)
                            <li>Display Name: {{ $event['creator']['displayName'] }}</li>
                        @endif
                        @if($event['creator']['email']!=null)
                            <li>Email: {{ $event['creator']['email']}}</li>
                        @endif
                    </ol>

                    <ol>Creator
                        @if($event['organizer']['displayName']!=null)
                            <li>Display Name: {{ $event['organizer']['displayName'] }}</li>
                        @endif
                        @if($event['organizer']['email']!=null)
                            <li>Email: {{ $event['organizer']['email']}}</li>
                        @endif
                    </ol>

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