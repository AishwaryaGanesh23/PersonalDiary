
@section('Upcoming')
@php
    $flag =0;
@endphp
@if(count($tasks)>0)
    @foreach( $tasks as $task)
        @if(Auth::user()->id ==  $task->user_id && $task->due_date > date('Y-m-d') && $task->status=='Incomplete')
            @php
                $flag =1;
            @endphp
            <div class = "card-body">
                <h3 class="card-title">
                        <a href = "/tasks/{{$task->id}}">
                        {{$task->title}}
                        </a>
                </h3>
                {!! Form::open(['action' => ['App\Http\Controllers\TasksController@completeTask',$task->id], 'method' => 'POST', 'class' => 'task'] )!!}
                {{Form::submit('Complete', ['class' => 'btn btn-success', 'style' => 'width: 80px; text-align: center' ])}}
                {!! Form::close() !!}
                
                <small class="card-text">Due by {{$task->due_date}} {{$task->due_time}}</small>
                <hr>                                                  
            </div>
        @endif  
    @endforeach    
@endif    
@if($flag==0)
    <div class = "card-body">
        <h3 class="card-title">You don't have any Upcoming tasks.</h3>
    </div>
@endif
@endsection