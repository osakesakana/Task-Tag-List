@extends('layouts.app')

@section('content')
    <h1>id: {{ $task->id }} のタスク編集ページ</h1>

    <div class="row mt-5">
        <div class="col-6">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
            
                @include('tasks.form')

                {!! Form::submit('タスクを更新する', ['class' => 'btn btn-primary mt-4']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection