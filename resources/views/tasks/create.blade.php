@extends('layouts.app')

@section('content')
    <h1>タスク新規作成ページ</h1>
    <div class="row mt-5">
        <div class="col-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
            
                @include('tasks.form')

                {!! Form::submit('新規作成', ['class' => 'btn btn-primary mt-4']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    
@endsection