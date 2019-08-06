@extends('layouts.main')


@section('title','Edit Task')

@section('content')

    <div class="row">
        <col-wm-12>
        <h1> Edit Task </h1>
            {!! Form::model($task,['route'=>['task.update',$task->id],'method'=>'PUT']) !!}

                @component('components.taskform')
                @endcomponent
                
            {!! Form::close() !!}
            
        </col-wm-12>
    </div>

@endsection