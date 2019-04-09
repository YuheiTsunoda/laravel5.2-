<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;

class TaskController extends Controller
{
    /**
     * タスクリポジトリーインスタンス
     *
     * @var TaskRepository
     */
    protected $tasks;


    /**
     * 新しいコントローラインスタンスの生成
     *
     * @return void
     */
//    リポジトリを使った依存注入
    public function __construct(TaskRepository $tasks)
    {
//        ミドルウェアを使ったユーザー認証
        $this->middleware('auth');

//        コントローラインスタンスのタスクをタイプヒントに
        $this->tasks = $tasks;
    }

    public function index(Request $request)
    {
//        ユーザーの持つタスクをビューに渡す
        return view('tasks.index',[
            'tasks' => $this->tasks->forUser($request->user()),
        ]);
    }

    public function store(Request $request)
    {
//        nameは必須かつ255以下
        $this->validate($request, [
            'name'=> 'required | max:225',
        ]);

//        アクセスできるユーザーの指定→タスク(Eloquentリレーション)
        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

//    ルート中の{task}変数がコントローラメソッド中の$task変数定義と一致するとき暗黙的モデル結合
    public function destroy(Request $request,Task $task)
    {
//        タスクモデルに関連付けたタスクポリシーのdestroyメソッドを起動
        $this->authorize('destroy',$task);
        $task->delete();

        return redirect('/tasks');
    }
}
