@extends('layouts.main')

@section('title', 'Tasks Home')

@section('content')
    <div class="row justify-content-center mb-3">
        <h2><span class="badge badge-secondary">Welcome To Do List</span></h2>
    </div>

  <div class="row justify-content-center mb-3">
    <div class="col-sm-4">
      <a href="{{ route('task.create') }}" class="btn btn-block btn-success">Create Task</a>
    </div>
  </div>
  @if($tasks->count()==0)

     <p class = "lead"> No Task To Do </p>
  @else
  @foreach($tasks as $task)

    <div class="row">
      <div class="col-sm-12">
      <div class="card text-white bg-primary" style="max-width: 20rem;">
        <h3>
          {{ $task->name }}
          <small>{{ $task->created_at }}</small>
        </h3>
        <p>{{ $task->discription }}</p>
        <h4>To Do Date: <small>{{ $task->todo_date }}</small></h4>
        </div>

        {!! Form::open(['route'=>['task.destroy', $task->id], 'method'=>'DELETE'])!!}
    
         <a href="{{ route('task.edit', $task->id)}}"class="btn btn-sm btn-dark">Edit</a>
         <a href="{{ route('task.show', $task->id)}}"class="btn btn-sm btn-warning">Show</a>

         
         <button type="submit" class="btn btn-sm btn-danger">Delete</button>
   
        {!!Form::close()!!}


      </div>
    </div>
    <hr>
  
      

  @endforeach
  @endif
  <div class="row justify-content-center">
    <div class="col-sm-6 text-center">
      {{ $tasks->links() }}
    </div>
  </div>

@endsection
