@section('Completed')
@php
    $flag =0;
@endphp
@if(count($tasks)>0)
    @foreach( $tasks as $task)
        @if($task->status =='Complete')
        @php
            $flag =1;
        @endphp
            <div class = "card-body">
                <h3 class="card-title">
                        <a href = "/tasks/{{$task->id}}" style="color: green">
                        {{$task->title}}
                        </a>
                </h3>
                {!! Form::open(['action' => ['App\Http\Controllers\TasksController@completeTask',$task->id], 'method' => 'POST', 'style' => 'font-size: 15px; float: right; position: relative; top: -5vh;'] )!!}
                {{Form::submit('Inomplete', ['class' => 'btn btn-warning','style' => 'width: 100px; text-align: center'])}}
                {!! Form::close() !!}
                
                <small class="card-text">Due by {{$task->due_date}} {{$task->due_time}}</small>
                <hr>                                                  
            </div>
        @endif  
    @endforeach    
@endif    
@if($flag==0)
    <div class = "card-body">
        <h3 class="card-title">You Haven't Completed any task yet.</h3>
    </div>
@endif
@endsection