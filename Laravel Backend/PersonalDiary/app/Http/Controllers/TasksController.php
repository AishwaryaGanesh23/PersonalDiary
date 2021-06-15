<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks = Task::OrderBy('due_date','asc')->get();
        return view('todo.index')->with('tasks',$tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todo.newTask');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this -> validate($request,[
            'title'=>'required',
            'duedate'=>'required',
        ]);

        $task = new Task;
        $task->user_id = Auth::user()->id;
        $task->title = $request->input('title');
        $task->description =  $request->input('desc');
        if($request->input('status')==null)
        {
            $status = 'Incomplete';
        }
        else{
            $status = 'Complete';
        }
        $task->status =  $status;
        $task->due_date =  $request->input('duedate');
        $task->due_time =  $request->input('duetime');
        $task->save();
        
        return redirect('/tasks');
    }

    public function completeTask($id){
        
        $task = Task::find($id);
       if($task->user_id !== Auth::user()->id)
        {
            return redirect('/tasks')->with('error','Unauthorized');
        }

        if($task->status=='Incomplete')
        {
            $status = 'Complete';
        }
        else{
            $status = 'Incomplete';
        }
        $task->status = $status;
        $task->save();
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $task = Task::find($id);
       if($task->user_id !== Auth::user()->id)
        {
            return redirect('/tasks')->with('error','Unauthorized');
        }
        
        return view('todo.showTask')->with('task',$task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task = Task::find($id);
       if($task->user_id !== Auth::user()->id)
       {
           return redirect('/tasks')->with('error','Unauthorized');
       }
       
       return view('todo.editTask')->with('task',$task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this -> validate($request,[
            'title'=>'required',
            'duedate'=>'required',
        ]);

        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->description =  $request->input('desc');
        if($request->input('status')==null)
        {
            $status = 'Incomplete';
        }
        else{
            $status = 'Complete';
        }
        $task->status =  $status;
        $task->due_date =  $request->input('duedate');
        $task->due_time =  $request->input('duetime');
        $task->save();
        
        return redirect('tasks/'.$task->id)->with('success','Entry Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $task = Task::find($id);
        if($task->user_id !== Auth::user()->id)
        {
            return redirect('/tasks')->with('error','Unauthorized');
        }
        $task->delete();
        return redirect('/tasks');
    }
}
