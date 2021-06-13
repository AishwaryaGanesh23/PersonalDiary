@section('All')
<div class="card-body">
    @if(count($tasks)>=1)
        @foreach( $tasks as $task)
            @if(Auth::user()->id ==  $task->user_id)
                <div class = "card-body">
                    <h3 class="card-title">
                            <a href = "/tasks/{{$task->id}}">
                            {{$task->title}}
                            </a>
                    </h3>
                    
                    <small class="card-text">Due by {{$task->due_date}} {{$task->due_time}}</small>
                                                                    
                </div>
            @endif  
        @endforeach
    @else
    <div class = "card-body">
            <h3 class="card-title">
                    You Havent Created any Tasks.
            </h3>
    @endif
</div>
@endsection