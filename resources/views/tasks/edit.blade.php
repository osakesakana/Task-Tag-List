@extends('layouts.app')

@section('content')
    <h1>id: {{ $task->id }} のタスク編集ページ</h1>

    <div class="row mt-5">
        <div class="col-6">
            {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
            
                <div class="form-group row">
                    {!! Form::label('content', 'タスク', ['class' => 'col-3 col-form-label']) !!}
                    {!! Form::text('content', null, ['class' => 'col-9 form-control']) !!}
                </div>
                
                <div class="form-group row">
                    {!! Form::label('priority', '優先度', ['class' => 'col-3 col-form-label']) !!}
                    <select class="col-5 form-control" id="priority" name="priority">
                        <option value="高" <?= $task->priority == '高' ? 'selected' : '' ?>>高</option>
                        <option value="中" <?= $task->priority == '中' ? 'selected' : '' ?>>中</option>
                        <option value="低" <?= $task->priority == '低' ? 'selected' : '' ?>>低</option>
                    </select>
                </div>
                
                <div class="form-group row">
                    {!! Form::label('progress', '進捗率', ['class' => 'col-3 col-form-label']) !!}
                    <select class="col-5 form-control" id="progress" name="progress">
                        <option value="0%"<?= $task->progress == '0%' ? 'selected' : '' ?>>0%</option>
                        <option value="20%"<?= $task->progress == '20%' ? 'selected' : '' ?>>20%</option>
                        <option value="40%"<?= $task->progress == '40%' ? 'selected' : '' ?>>40%</option>
                        <option value="60%"<?= $task->progress == '60%' ? 'selected' : '' ?>>60%</option>
                        <option value="80%"<?= $task->progress == '80%' ? 'selected' : '' ?>>80%</option>
                        <option value="100%"<?= $task->progress == '100%' ? 'selected' : '' ?>>100%</option>
                    </select>
                </div>
                
                <div class="form-group row">
                    {!! Form::label('tag_id', 'タグ', ['class' => 'col-3 col-form-label']) !!}
                    <select class="col-5 form-control" id="tag_id" name="tag_id">
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}" <?= $task->tag->id == $tag->id ? 'selected' : '' ?>>{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>

                {!! Form::submit('タスクを更新する', ['class' => 'btn btn-primary mt-4']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection