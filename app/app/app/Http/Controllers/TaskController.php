<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks]);
    }

    public function store(TaskRequest $request)
    {
        $task = new Task;
        $form = $request->all();
        unset($form['_token']);
        $task->fill($form)->save();
        return redirect('/tasks');
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect('/tasks');
    }
}
