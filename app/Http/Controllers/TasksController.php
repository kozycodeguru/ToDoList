<?php

namespace App\Http\Controllers;

use App\Model\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $task= Task::orderBy('todo_date', 'asc')->paginate(7);

        return view('tasks.index')->with('tasks',$task);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       $this->validate($request, [
           'name'=>'required|string|max:255|min:3',
           'discription'=>'required|string|max:1000|min:10',
           'todo_date'=>'required|date',
       ]);

       $task= new Task;
        
       $task->name=$request->name;
       $task->discription=$request->discription;
       $task->todo_date=$request->todo_date;

       $task->save();

       Session::flash('success','Created Task Successfully');

       return redirect()->route('task.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
       

        return view('tasks.show')->withTask($task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task=Task::find($id);
        $task->todoDateFormatting=false;
        return view('tasks.edit')->withTask($task);
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
        $this->validate($request, [
            'name'=>'required|string|max:255|min:3',
            'discription'=>'required|string|max:1000|min:10',
            'todo_date'=>'required|date',
        ]);
        $task=Task::find($id);
         
       $task->name=$request->name;
       $task->discription=$request->discription;
       $task->todo_date=$request->todo_date;

       $task->save();

       Session::flash('success','Created Task Successfully');

       return redirect()->route('task.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        Session::flash('success', 'Deleted task Succesfully');

        return redirect()->route('task.index');

    }
}
