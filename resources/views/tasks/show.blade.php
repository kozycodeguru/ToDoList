@extends('layouts.main')


@section('title','Show Task')

@section('content')

    <div class="row">
        <col-wm-12>
        <h1> Show Task </h1>
        <p>{{ $task->discription }}</p>
        
        </col-wm-12>
        
    </div>
    <div class="row">
    <a href="{{ route('task.index', $task->id)}}"class="btn btn-sm btn-warning">Go Back</a>
    </div>
@endsection