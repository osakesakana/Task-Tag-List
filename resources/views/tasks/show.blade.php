@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>
    <div class="row mt-5">
        <div class="col-6">
            <div class="form-group row">
                    <p class="col-3 text-muted">タスク</p>
                    <p class="col-9">{{ $task->content }}</p>
                    
                    <p class="col-3 text-muted">優先度</p>
                    <p class="col-9">{{ $task->priority }}</p>
                    
                    <p class="col-3 text-muted">進捗率</p>
                    <p class="col-9">{{ $task->progress }}</p>
                    
                    <p class="col-3 text-muted">タグ</p>
                    <p class="col-9">{{ $task->tag->title }}</p>
            </div>
            
            <div>
                
            
                {{-- タスク削除フォーム --}}
                {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                    {{-- タスク編集ページへのリンク --}}
                    {!! link_to_route('tasks.edit', 'このタスクを編集', ['task' => $task->id], ['class' => 'btn btn-light mx-2']) !!}
                    {!! Form::submit('削除', ['class' => 'btn btn-danger mx-2']) !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection