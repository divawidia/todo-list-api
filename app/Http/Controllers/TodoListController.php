<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    public function index(){
        $lists = TodoList::all();
        return response($lists);
    }

    public function show(TodoList $id)
    {
        return response($id);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => ['required']]);

        $list = TodoList::create($request->all());
        return $list;
    }

    public function update(Request $request, TodoList $id)
    {
        $id->update($request->all());
        return response($id);
    }

    public function destroy(TodoList $id)
    {
        $id->delete();
        return response('', Response::HTTP_NO_CONTENT);
    }

}
