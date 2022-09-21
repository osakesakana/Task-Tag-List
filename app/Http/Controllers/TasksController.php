<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Tag;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $priority = $request->input('priority');
        if($priority == null){
            $priority = 0;
        }
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            if($priority == 0){
                $tasks = $user->tasks()->where('priority', '高')->orderBy('created_at', 'desc')->paginate(10);
                $priority = 0 ;
            }elseif($priority == 1){
                $tasks = $user->tasks()->where('priority', '中')->orderBy('created_at', 'desc')->paginate(10);
                $priority = 1 ;
            }else{
                $tasks = $user->tasks()->where('priority', '低')->orderBy('created_at', 'desc')->paginate(10);
                $priority = 2 ;
            }
            
            $tags = Tag::all();

            $data = [
                'user' => $user,
                'tasks' => $tasks,
                'tags' =>$tags,
                'priority' => $priority,
            ];
        // dd($data);
        }

        return view('tasks.index', $data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        $tags = Tag::all();

        return view('tasks.create', [
            'task' => $task,
            'tags' => $tags,
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
            'progress' => 'required',
            'priority' => 'required',
            'content' => 'required',
            'tag_id' => 'required',
        ]);
        // 
        $request->user()->tasks()->create([
            'progress' => $request->progress,
            'priority' => $request->priority,
            'content' => $request->content,
            'tag_id' =>$request->tag_id,
        ]);

        // トップページへリダイレクトさせる
        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        if (\Auth::id() === $task->user_id) {
        return view('tasks.show', [
            'task' => $task,
        ]);
        }
        
        // トップページへリダイレクトさせる
        return redirect('/tasks');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $tags = Tag::all();
        
        if (\Auth::id() === $task->user_id) {
        // メッセージ編集ビューでそれを表示
        return view('tasks.edit', [
            'task' => $task,
            'tags' => $tags,
        ]);
        }
        // トップページへリダイレクトさせる
        return redirect('/tasks');
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
            'progress' => 'required',
            'priority' => 'required',
            'content' => 'required',
            'tag_id' => 'required',
        ]);
        $task = Task::findOrFail($id);

        // メッセージを更新
        $task->progress = $request->progress;
        $task->priority = $request->priority;
        $task->content = $request->content;
        $task->tag_id = $request->tag_id;
        
        $task->save();

        // トップページへリダイレクトさせる
        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        // トップページへリダイレクトさせる
        return redirect('/tasks');
    }
    
    public function completed()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }

        return view('tasks.completed', $data);
    }
}
