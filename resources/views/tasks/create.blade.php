@extends('layouts.app')

@section('content')
    <h1>タスク新規作成ページ</h1>
    <div class="row mt-5">
        <div class="col-6">
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
            
                <div class="form-group row">
                    {!! Form::label('content', 'タスク', ['class' => 'col-3 col-form-label']) !!}
                    {!! Form::text('content', null, ['class' => 'col-9 form-control']) !!}
                </div>
                
                <div class="form-group row">
                    {!! Form::label('priority', '優先度', ['class' => 'col-3 col-form-label']) !!}
                    <select class="col-5 form-control" id="priority" name="priority">
                        <option value="高">高</option>
                        <option value="中">中</option>
                        <option value="低">低</option>
                    </select>
                </div>
                
                <div class="form-group row">
                    {!! Form::label('progress', '進捗率', ['class' => 'col-3 col-form-label']) !!}
                    <select class="col-5 form-control" id="progress" name="progress">
                        <option value="0%">0%</option>
                        <option value="20%">20%</option>
                        <option value="40%">40%</option>
                        <option value="60%">60%</option>
                        <option value="80%">80%</option>
                        <option value="100%">100%</option>
                    </select>
                </div>
                
                <div class="form-group row">
                    {!! Form::label('tag_id', 'タグ', ['class' => 'col-3 col-form-label']) !!}
                    <select class="col-5 form-control" id="tag_id" name="tag_id">
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                        @endforeach
                    </select>
                </div>

                {!! Form::submit('新規作成', ['class' => 'btn btn-primary mt-4']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    
@endsection