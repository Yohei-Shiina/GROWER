<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Target;
use Illuminate\Support\Facades\Input;
class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store($id, Request $request)
    {

        $task = Task::create([
            'task' => $request->task,
            'target_id' => $id,
            'status' => false,
            ]);
        return response()->json($task);

        // return redirect("targets/{$task->target->id}");
    }

    public function update($target_id, $task_id)
    {
        $target = Target::find($target_id);
        $task = $target->tasks()->find($task_id);
        if ($task->status == true) {
            $task->update(array('status' => false,));
        }else{
            $task->update(array('status' => true));
        }
        return response()->json();
    }

    public function destroy($target_id, $task_id)
    {   
        $target = Target::find($target_id);
        $task = $target->tasks()->find($task_id);
        $task->delete();
        return response()->json();
    }

}
