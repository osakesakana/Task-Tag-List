<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザのタグの一覧を作成日時の降順で取得
            // （後のChapterで他ユーザの投稿も取得するように変更しますが、現時点ではこのユーザの投稿のみ取得します）
            $tags = $user->tags()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tags' => $tags,
            ];
        }

        return view('tags.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag;

        return view('tags.create', [
            'tag' => $tag,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required',
        ]);
        
        $request->user()->tags()->create([
            'title' => $request->title,
        ]);

        // タグ一覧ページへリダイレクトさせる
        return redirect('/tags');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tag = Tag::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        if (\Auth::id() === $tag->user_id) {
        return view('tags.show', [
            'tag' => $tag,
        ]);
        }
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        
        if (\Auth::id() === $tag->user_id) {
        // メッセージ編集ビューでそれを表示
        return view('tags.edit', [
            'tag' => $tag,
        ]);
        }
        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーション
        $request->validate([
            'title' => 'required',
        ]);
        
        $tag = Tag::findOrFail($id);
        // メッセージを更新
        $tag->title = $request->title;
        $tag->save();

        // タグ一覧ページへリダイレクトさせる
        return redirect('/tags');
    }
    
    public function destroy($id)
    {
        $tag = tag::findOrFail($id);
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $tag->user_id) {
            $tag->delete();
        }

        // トップページへリダイレクトさせる
        return redirect('/tags');
    }
}
