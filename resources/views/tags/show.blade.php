@extends('layouts.app')

@section('content')

<h1>id = {{ $tag->id }} のタグ詳細ページ</h1>
<div class="row mt-5">
    <div class="col-6">
        <div class="form-group row">

            <p class="col-3 text-muted">id</p>
            <p class="col-9">{{ $tag->id }}</p>

            <p class="col-3 text-muted">タグ名</p>
            <p class="col-9">{{ $tag->title }}</p>
        </div>

{{-- タグ編集ページへのリンク --}}
{!! link_to_route('tags.edit', 'このタグを編集', ['tag' => $tag->id], ['class' => 'btn btn-light mx-2']) !!}

@endsection