<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TaskController extends Controller
{
    public function index($status = 'all')
    {
        $tasks = Task::all();
        $allTasks = collect($tasks)->map(function ($task, $key) {
            $task['task_id'] = $key;
            return $task;
        });
        $workingTasks = $allTasks->where('status', 1);
        $finishedTasks = $allTasks->where('status', 2);

        if ($status == 'all') {
            $taskLists = $allTasks;
        } else if ($status == 'working') {
            $taskLists = $workingTasks;
        } else if ($status == 'finished') {
            $taskLists = $finishedTasks;
        }

        return view('index', ['tasks' => $taskLists, 'filterStatus' => $status]);
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

    public function update(TaskRequest $request, $id)
    {
        $task = Task::find($id);
        if ($request->status == 1) {
            $task->status = 2;
        } else if ($request->status == 2) {
            $task->status = 1;
        }
        $task->save();
        return redirect('/tasks');
    }
}
