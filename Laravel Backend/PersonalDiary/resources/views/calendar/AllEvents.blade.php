@section('AllEvents')
@if(count($events)>0)
    @foreach( $events as $event)
            <div class = "card-body">
                <h3 class="card-title">
                    <a href = "/calendar/{{$event->id}}">
                        {{$event->summary}}
                    </a>
                </h3>
                @if($event['start']['dateTime']!= null && $event['end']['dateTime']!= null)
                    @if(substr($event['start']['dateTime'],0,10)==substr($event['end']['dateTime'],0,10))
                        <small class="card-text">Date: {{substr($event['start']['dateTime'],0,10)}}</small>
                        <small class="card-text">Time {{substr($event['start']['dateTime'],11,5).' - '.substr($event['end']['dateTime'],11,5)}}</small>
                    @else
                        <small class="card-text">Start {{substr($event['start']['dateTime'],0,10).' : '.substr($event['start']['dateTime'],11,5).' - '}}</small>
                        <small class="card-text">End {{substr($event['end']['dateTime'],0,10).' : '.substr($event['end']['dateTime'],11,5)}}</small>
                    @endif
                @else
                    <small class="card-text">Date: {{ $event['start']['date'] }}</small>
                @endif
                
            </div>
            <hr>
    @endforeach    
@else
    <div class = "card-body">
        <h3 class="card-title">You Have No Events.</h3>
    </div>
@endif
@endsection