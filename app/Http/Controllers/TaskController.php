<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyTaskRequest;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;


class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->paginate(8);
        return view('tasks', ['tasks'=>$tasks]);
    }

    public function store(StoreTaskRequest $request)
    {
        $request->user()->tasks()->create($request->validated());
        return back();
    }

    public function destroy(DestroyTaskRequest $request, Task $task)
    {
        $task->delete();
        return back();
    }
}

