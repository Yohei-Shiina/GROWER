<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Target;
use App\Task;
use Illuminate\Support\Facades\Input;
class TargetsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        $targets = Target::all();
        return view('targets.index')->with("targets", $targets);
    }
    
    public function create()
    {
        $target = new Target();
        $task = new Task();
        return view('targets.create', ['target' => $target, 'task' => $task,]);
    }

    public function store(Request $request)
    {
        Target::create([
            'goal' => $request->goal,
            'date' => $request->date,
            'time' => $request->time,
            'user_id' => 1,
            'status' => false,
        ]);
        return view('targets.store');
    }

    public function show($id)
    {
        $target = Target::with('tasks')->find($id);
        $tasks = $target->tasks()->get();
        return view('targets.show')->with(array('target'=> $target, 'tasks' => $tasks));
    }

    public function edit($id)
    {   
        $target = Target::find($id);
        return view('targets.edit')->with('target', $target);
    }

    public function update(Request $request, $id)
    {
        $target = Target::find($id);

        if (Input::get('achieve')){
            $target->update([
                'status' => true
                ]);
        }else{
            $target->update([
                'goal' => $request->goal,
                'date' => $request->date,
                'time' => $request->time,
            ]);
        }
        return view('targets.update');
    }

    public function destroy($id)
    {
        $target = Target::find($id);      
        $target->delete();

        return view('targets.destroy');
    }
}
