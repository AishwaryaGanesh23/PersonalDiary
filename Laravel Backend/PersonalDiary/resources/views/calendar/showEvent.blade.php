@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/calendar" class="breadcrumb-item">Calendar</a>
    <a class="breadcrumb-item active" aria-current="page">{{$event->summary}}</a>
@endsection

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header" style="font-size:30px; font-family: 'Playfair Display', serif; text-align: center;">
                    <a href="{{ $event->htmlLink }}">{{ $event->summary}} </a>
                    
                </div>
                <div class="card-body">
                    <table class="table">  
                        <tbody>
                        <tr>
                            <td>Organiser:
                                @if($event['creator']['displayName']!=null)
                                    Display Name: {{ $event['creator']['displayName'] }}
                                @endif

                                @if($event['creator']['email']!=null)
                                    Email: {{ $event['creator']['email']}}
                                @endif
                            </td>  

                            <td>Creator:
                                @if($event['organizer']['displayName']!=null)
                                    Display Name: {{ $event['organizer']['displayName'] }}
                                @endif

                                @if($event['organizer']['email']!=null)
                                    Email: {{ $event['organizer']['email']}}
                                @endif
                            </td>                               
                        </tr>

                        @if($event['start']['dateTime']!= null)
                            
                            <tr>
                            <!-- <th scope="row">1</th> -->
                                <td>Start Date:
                                {{ substr($event['start']['dateTime'],0,10) }}</td>

                                <td>Time:
                                {{substr($event['start']['dateTime'],11,5)}} </td>
                            </tr>

                            <tr>
                                <td>End Date:{{ substr($event['end']['dateTime'],0,10) }}</td>

                                <td>Time at: {{substr($event['end']['dateTime'],11,5)}}</td>                                
                            </tr>
            
                        @else
                            <tr>
                                <td>Date: {{ $event['start']['date'] }}</td>   
                                <td>Full Day Event</td>                            
                            </tr>
                        @endif

                        @if($event['attendees']!=null)
                            <tr>
                               <td>Attendees List:</td>                            
                            </tr>
                            @foreach ($event['attendees'] as  $attendee)
                                <tr>
                                @if($attendee['displayName']!=null)
                                    <td>Name: {{ $attendee['displayName'] }}</td> 
                                @endif 

                                @if($attendee['email']!=null)
                                    <td>Email: {{ $attendee['email']}}</td>
                                @endif  

                                @if($attendee['responseStatus']!=null)
                                    <td>Response Status: {{ $attendee['responseStatus']}}</td>
                                @endif                        
                                </tr>
                            @endforeach
                        @endif

                        @if($event->hangoutLink!=null)
                            <tr>
                                <td>Hangout link: <a href="{{ $event->hangoutLink }}">{{ $event->hangoutLink }}</td>                             
                            </tr>
                        @endif

                        @if($event->location!=null)
                            <tr>
                                <td>Location:{{ $event->location }}</td>                             
                            </tr>
                        @endif
                        </tbody> 
                    </table>
                    
                    <hr>

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