@extends('layouts.app')

@section('content')
    <h1>id: {{ $tag->id }} のタグ編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'put']) !!}
            
                <div class="form-group">
                    {!! Form::label('title', 'タグ名:') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('更新', ['class' => 'btn btn-success']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection