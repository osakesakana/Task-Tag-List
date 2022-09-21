@extends('layouts.app')

@section('content')
        <h1>タスク一覧</h1>
        @include('tasks.createlinks')
        @include('tasks.navtabs')
        
        @if (count($tasks) > 0)
            <table class="table mt-2">
                <thead>
                    <tr class="p-3 mb-2 bg-primary text-white">
                        <th>id</th>
                        <th>タスク名</th>
                        <th>進捗率</th>
                        <th>タグ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        @if ($task->progress != "100%" && $task->priority == "中")
                        <tr>
                            {{-- タスク詳細ページへのリンク --}}
                            <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                            <td>{{ $task->content }}</td>
                            <td>{{ $task->progress }}</td>
                            <td>{{ $task->tag->title }}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            {{-- タグ一覧ページへのリンク --}}
            {!! link_to_route('tags.index', 'タグ一覧を確認する', [], ['class' => 'btn btn-primary']) !!}
            @endif
@endsection