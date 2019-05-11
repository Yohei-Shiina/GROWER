<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
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
        return redirect("targets/{$task->target->id}");
    }
    
    public function postForm($target_id, $task_id)
    {
        if(Input::get('change')){
            $this->update($task_id);
            
        }elseif (Input::get('delete')){
            $this->destroy($task_id);
        }
        return redirect("targets/{$target_id}");
    }

    public function update($task_id)
    {
        $task = Task::find($task_id);
        if ($task->status == true) {
            $task->update(array('status' => false,));
        }else{
            $task->update(array('status' => true));
        }
    }

    public function destroy($task_id)
    {
        Task::destroy($task_id);
    }
}
