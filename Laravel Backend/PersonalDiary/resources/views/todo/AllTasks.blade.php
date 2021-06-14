@section('All')
<div class="card-body">
    @if(count($tasks)>=1)
        @foreach( $tasks as $task)
            @if(Auth::user()->id ==  $task->user_id)
                <div class = "card-body">
                    @if($task->status=="Complete" )
                    <h3 class="card-title" style="text-decoration: line-through;">
                    <a href = "/tasks/{{$task->id}}" style="color: green">
                    @elseif($task->due_date < date('Y-m-d'))
                        <h3 class="card-title">
                        <a href = "/tasks/{{$task->id}}" style="color: red">
                    @elseif($task->due_date == date('Y-m-d'))
                        <h3 class="card-title">
                        <a href = "/tasks/{{$task->id}}" style="color: blue">
                        @else
                        <h3 class="card-title" >
                        <a href = "/tasks/{{$task->id}}">
                    @endif
                            <!-- <a href = "/tasks/{{$task->id}}"> -->
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