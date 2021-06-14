@section('DueToday')
@php
    $flag =0;
@endphp
@if(count($tasks)>0)
    @foreach( $tasks as $task)
        @if($task->due_date == date('Y-m-d') && $task->status =='Incomplete')
        @php
            $flag =1;
        @endphp
            <div class = "card-body">
                <h3 class="card-title">
                        <a href = "/tasks/{{$task->id}}" style="color: blue">
                        {{$task->title}}
                        </a>
                </h3>
                
                <small class="card-text">Due by {{$task->due_date}} {{$task->due_time}}</small>
                                                                
            </div>
        @endif  
    @endforeach    
@endif    
@if($flag==0)
    <div class = "card-body">
        <h3 class="card-title">You Dont Have any Tasks Due Today.</h3>
            
    </div>
@endif
@endsection