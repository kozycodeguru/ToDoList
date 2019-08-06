@extends('layouts.main')


@section('title','Home Page')

@section('content')




@foreach($tasks as $task)
       
        <div class="card text-white bg-primary" style="max-width: 20rem;">

        <div class="card-body">
            <h4 class="card-title"><u><b>{{$task->name}}</b></u></h4>
        <p class="card-text">{{$task->discription}}</p>
        <small>
            {{$task->todo_date}}
        </small>
        </div>

        </div>
   
<hr>

    @endforeach


@endsection