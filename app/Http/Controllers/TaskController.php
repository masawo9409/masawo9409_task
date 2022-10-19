<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show', ['task' => $task]);
    }

    public function index()
    {
        //モデルクラスから、すべてのデータを取得し$taskに代入している
        $tasks = Task::all();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    //$requestがformから送られてきたデータを受け取っている
    //この際requestは、titleとbodyの内容をそれぞれ受け取っている。→nameがテーブルのカラムと紐付いている？
    public function store(TaskRequest $request)
    {
        //なぜインスタンス化するのか？？？
        $task = new Task;

        //何故下記の記載方法で、テーブルに追加になるのか？→おそらくincreamentsにしているからインスタンスに各場合は自動で追加になる。
        $task->title = $request->title;
        $task->body  = $request->body;

        $task->save();

        return redirect('/tasks');
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('tasks.edit', ['task' => $task]);
    }

    //editのフォームから編集対象の$idを受け取ることができる。
    public function update(TaskRequest $request, $id)
    {
        //taskモデルクラスから編集対象のidをもつデータを取得し、$taskに入力。
        $task = Task::find($id);
        //
        $task->title = $request->title;
        $task->body = $request->body;

        $task->save();
        return redirect('/tasks');
    }

    public function destroy($id)
    {
        $task = Task::find($id);

        $task->delete();

        return redirect('/tasks');
    }
}
