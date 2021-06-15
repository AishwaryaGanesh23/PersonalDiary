@section('AllEvents')
@if(count($events)>0)
    @foreach( $events as $event)
        {{-- @if(Auth::user()->id ==  $post->user_id) --}}
            <div class = "card-body">
                <h3 class="card-title">
                    <a href = "/calendar/{{$event->id}}">
                        {{$event->summary}}
                    </a>
                </h3>
                @if($event['start']['dateTime']!= null)
                    <small class="card-text">Start {{substr($event['start']['dateTime'],0,10).' : '.substr($event['start']['dateTime'],11,5).' - '}}</small>
                    <small class="card-text">End {{substr($event['end']['dateTime'],0,10).' : '.substr($event['end']['dateTime'],11,5)}}</small>
                @else
                    <small class="card-text">Date: {{ $event['start']['date'] }}</small>
                @endif
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
@endsection