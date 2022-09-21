@extends('layouts.app')

@section('content')
        <h1>タグ一覧</h1>
    
        @if (count($tags) > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
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
        @endif
@endsection