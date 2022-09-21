@extends('layouts.app')

@section('content')
    <h1>タスク新規作成ページ</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('content', 'タスク:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('priority', '優先度:') !!}
                    {{Form::select('priority', ['低', '中', '高'])}}
                </div>
                
                <div class="form-group">
                    {!! Form::label('progress', '進捗率:') !!}
                    {{Form::select('progress', ['0%', '20%', '40%', '60%', '80%', '100%'])}}
                </div>
                
                <div class="form-group">
                    {!! Form::label('tag_id', 'タグ:') !!}
                    {{Form::select('tag_id', ['0%', '20%', '40%', '60%', '80%', '100%'])}}
                </div>

                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    
@endsection