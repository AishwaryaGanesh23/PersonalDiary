@section('TodaysEvents')
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
                @if($event['start']['dateTime']!= null && $event['end']['dateTime']!= null)
                    @if(substr($event['start']['dateTime'],0,10)==substr($event['end']['dateTime'],0,10))
                    <small class="card-text">Time {{substr($event['start']['dateTime'],11,5).' - '.substr($event['end']['dateTime'],11,5)}}</small>
                    @else
                    <small class="card-text">Time {{substr($event['start']['dateTime'],11,5).' - '.substr($event['end']['dateTime'],0,10).' at '.substr($event['end']['dateTime'],11,5)}}</small>
                    @endif
                
                @else
                <small class="card-text">Full Day</small>
            @endif
            <hr>
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
@endsection