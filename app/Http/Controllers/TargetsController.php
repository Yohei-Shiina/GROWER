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
        Target::create([
            'goal' => $request->goal,
            'date' => $request->date,
            'time' => $request->time,
            'user_id' => Auth::user()->id,
            'status' => false,
        ]);
        return redirect('/targets');
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
        $target->delete();

        return redirect('targets');
    }

    // Ajax処理による経過時間表示
    public function passedTime(Request $request)
    {
        $target = Target::find($request->id);

        $now = new DateTime('now');
        $createdTime = new DateTime($target->created_at);
        $passedTime = $createdTime->diff($now)->format('%h時間%i分%s秒');
        

        return response()->json($passedTime);
    }

    // Ajax処理による経過時間表示
    public function dueTime(Request $request)
    {
        $target = Target::find($request->id);
        $date = strval($target->date);
        $time = strval($target->time);
        $date_time = $date . " " . $time;
        $dateTime = new DateTime($date_time);
        $now = new DateTime("now");
        if ($dateTime > $now == true) {
            // 期限が現在よりも未来
            $diff = $now->diff($dateTime);
            $dueTime = $diff->format("%d日%h時間%i分");
            return response()->json($dueTime);
        } else{
            // 期限が現在よりも過去
            return response()->json("時間切れ");
        }
    }
}
