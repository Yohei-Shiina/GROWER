<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
class TasksController extends Controller
{
    public function store($id, Request $request) {
        $task = Task::create([
            'task' => $request->task,
            'target_id' => $id,
            'status' => false,
            ]);
        return redirect("targets/{$task->target->id}");
    }
}
