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
                            
                            {{$task->title}}
                            </a>
                    </h3>
                    {!! Form::open(['action' => ['App\Http\Controllers\TasksController@completeTask',$task->id], 'method' => 'POST', 'style' => 'font-size: 15px; float: right; position: relative; top: -5vh;'] )!!}
                    @if($task->status == 'Incomplete')
                        {{Form::submit('Complete', ['class' => 'btn btn-success', 'style' => 'width: 80px; text-align: center; ' ])}}
                    @else
                    {{Form::submit('Inomplete', ['class' => 'btn btn-warning','style' => 'width: 80px; text-align: center'])}}
                    @endif
                    {!! Form::close() !!}

                    
                    <small class="card-text">Due by {{$task->due_date}} {{$task->due_time}}</small>
                    <hr>                                                
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