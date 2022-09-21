@extends('layouts.app')

@section('content')
        <h1>完了済みタスク一覧</h1>
    
        @if (count($tasks) > 0)
            <table class="table mt-5">
                <thead>
                    <tr class="p-3 mb-2 bg-primary text-white">
                        <th>id</th>
                        <th>タスク名</th>
                        <th>優先度</th>
                        <th>タグ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        @if ($task->progress == "100%")
                        <tr>
                            {{-- タスク詳細ページへのリンク --}}
                            <td>{!! link_to_route('tasks.show', $task->id, ['task' => $task->id]) !!}</td>
                            <td>{{ $task->content }}</td>
                            <td>{{ $task->priority }}</td>
                            <td>{{ $task->tag->title }}</td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            {{-- タスク一覧ページへのリンク --}}
            {!! link_to_route('tasks.index', 'タスク一覧に戻る', [], ['class' => 'btn btn-primary mt-4']) !!}
        @endif
@endsection