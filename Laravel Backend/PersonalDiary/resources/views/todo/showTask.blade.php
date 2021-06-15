@extends('layouts.pagelayout')

@include('layouts.sidebar')

@section('breadcrumb')
    <a href="/home" class="breadcrumb-item">Home</a>
    <a href="/tasks" class="breadcrumb-item">Tasks</a>
    <a class="breadcrumb-item active" aria-current="page">{{$task->title}}</a>
@endsection

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
            <div class="card-header" style="font-size:30px; font-family: 'Playfair Display', serif; text-align: center;">
                    {{-- {{ __('Your Post') }} --}}
                    {{$task->title}} 
                </div>
                <div class="card-body">

                    <small class="card-subtitle ">Created on {{$task->created_at}}</small>
                    <small class="card-subtitle ">Updated on {{$task->updated_at}}</small>
                    
                    <pre  class="card-text" style="width: 100%;white-space: pre-wrap; ">{{$task->description}}</pre>
                    <P class="card-text">Due by {{$task->due_date}} {{$task->due_time}}</p>
                    <p>Status: {{ $task->status }}</p>


                    <a href="/tasks/{{$task->id}}/edit"><button class="btn btn-primary" style="float:left; margin-right: 5px; "> Edit </button></a>
                    {!! Form::open(['action' => ['App\Http\Controllers\TasksController@destroy',$task->id], 'method' => 'DELETE', 'style' => 'float: left']) !!}
                    {{Form::submit('Delete',['class'=>'btn btn-danger'])  }}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection