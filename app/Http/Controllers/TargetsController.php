<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Target;
use DateTime;
class TargetsController extends Controller
{
    
  

    public function index()
    {
        
        $targets = Target::all();
        return view('targets.index')->with("targets", $targets);
    }
    
    public function create()
    {
        return view('targets.create');
    }

    public function store(Request $request)
    {
        Target::create([
            'goal' => $request->goal,
            'date' => $request->date,
            'time' => $request->time,
        ]);
        return view('targets.store');
    }

    public function show($id)
    {
        
        $target = Target::find($id);
        return view('targets.show')->with('target', $target);
    }

    public function edit($id)
    {   
        $target = Target::find($id);
        return view('targets.edit')->with('target', $target);
    }

    public function update(Request $request, $id)
    {   
        Target::find($id)->update([
            'goal' => $request->goal,
            'date' => $request->date,
            'time' => $request->time,
        ]);
        return view('targets.update');
    }

    public function destroy($id)
    {
        $target = Target::find($id);      
        $target->delete();

        return view('targets.destroy');
    }
}
