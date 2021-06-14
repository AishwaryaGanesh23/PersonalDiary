@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/tasks" class="breadcrumb-item">To Do List</a>
    <a href="/tasks/{{$task->id}}" class="breadcrumb-item" aria-current="page">{{$task->title}}</a>
    <a class="breadcrumb-item active" aria-current="page">Edit Task</a>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header" style="font-size: 25px; font-family: 'Playfair Display', serif;">
                    {{ __('Edit Task') }}
                    <a href="/tasks/{{$task->id}}" style="float:right; font-size: 13px;"><i class="fa fa-close"></i></a>
                </div>
                
                {!! Form::open(['action' => ['App\Http\Controllers\TasksController@update',$task->id], 'method' => 'PUT', 'class' => 'createform', 'style' => 'font-size: 15px'] )!!}

                <div class="form-group"> 
                    {{Form::label('title', 'Task Name: ')}}
                    {{Form::text('title', $task->title, ['class' => 'form-control' , 'placeholder' => 'Task Title','required' => 'required'])}}
                </div>

                <div class="form-group"> 
                    {{Form::label('desc', 'Task Description')}}
                    {{Form::textarea('desc', $task->description, ['class' => 'form-control' , 'placeholder' => 'Task Description'])}}
                </div>

                <div class="form-group"> 
                    {{Form::label('duedate', 'Due Date')}}
                    {!! Form::date('duedate', $task->due_date, ['class' => 'form-control' , 'placeholder' => 'Date','required' => 'required']) !!}
                </div>

                <div class="form-group"> 
                    {{Form::label('time', 'Due Time')}}
                    {!! Form::time('duetime', $task->due_time, ['class' => 'form-control' , 'placeholder' => 'Date']) !!}
                </div>

                <div class="form-group">
                    <input type="checkbox" name="status" id="taskStatus" value="Complete" {{ $task->status=="Complete" ? 'checked' : '' }}>
                    {{Form::label('status', 'Completed')}}
                    
                </div>

                {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}                  

                {!! Form::close() !!}
            </div> 
        </div>
    </div>
</div>
@endsection