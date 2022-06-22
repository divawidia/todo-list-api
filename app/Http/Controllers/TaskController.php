<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

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
}
