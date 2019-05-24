<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Target;
use App\Task;
use Auth;
use DateTime;
use Illuminate\Support\Facades\Input;

class TargetsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $targets = Auth::user()->targets()->get();
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
        if($request->goal == null){
            return back();
        }
        $target = Target::create([
            'goal' => $request->goal,
            'date' => $request->date,
            'time' => $request->time,
            'user_id' => Auth::user()->id,
            'status' => false,
        ]);
        return redirect("targets/{$target->id}");
    }

    public function show($id)
    {
        $target_id = Target::find($id);

        if($target_id){
            
            if($target_id->user_id != Auth::user()->id){
                
                return back();

            }else{
                
                $target = $target_id;
                $tasks = $target->tasks()->get();
                return view('targets.show')->with(array('target'=> $target, 'tasks' => $tasks));
            }

        }else{
            
            return back();
        }
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
        return redirect("/targets/{$id}");
    }

    public function destroy($id)
    {
        $target = Target::find($id);
        $target->tasks()->delete();   
        $target->delete();

        return redirect('targets');
    }
}
