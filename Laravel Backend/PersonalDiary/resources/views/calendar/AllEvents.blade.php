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
@endsection