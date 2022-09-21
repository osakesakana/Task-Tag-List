@extends('layouts.app')

@section('content')
    <h1>タグ新規作成ページ</h1>
    <div class="row">
        <div class="col-6">
            {!! Form::model($tag, ['route' => 'tags.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('title', 'タグ名:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('作成する', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
    
@endsection