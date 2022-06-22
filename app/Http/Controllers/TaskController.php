<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoListRequest;
use App\Models\Task;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TaskController extends Controller
{
    public function index()
    {
        $task = Task::all();
        return response($task);
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());
        return $task;
    }

    public function update(Request $request, Task $task)
    {
        $task->update($request->all());
        return response($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }
}
