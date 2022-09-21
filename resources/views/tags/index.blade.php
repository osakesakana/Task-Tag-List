@extends('layouts.app')

@section('content')
        <h1>タグ一覧</h1>
        {{-- タグ作成ページへのリンク --}}
        {!! link_to_route('tags.create', '新規タグの作成', [], ['class' => 'btn btn-dark mt-5']) !!}
    
        @if (count($tags) > 0)
            <table class="table mt-4">
                <thead>
                    <tr class="bg-success p-2 text-white bg-opacity-75">
                        <th>id</th>
                        <th>タグ名</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tags as $tag)
                    <tr>
                        {{-- タグ詳細ページへのリンク --}}
                        <td>{!! link_to_route('tags.show', $tag->id, ['tag' => $tag->id]) !!}</td>
                        <td>{{ $tag->title }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- タスク一覧ページへのリンク --}}
            {!! link_to_route('tasks.index', 'タスク一覧を確認する', [], ['class' => 'btn btn-success']) !!}
        @endif
@endsection