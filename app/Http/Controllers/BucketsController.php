<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bucket;
use Auth;
use Illuminate\Support\Facades\Input;

class BucketsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $buckets = Auth::user()->buckets()->get();

        return view('buckets.index')->with('buckets', $buckets);
    }
    
    public function store(Request $request)
    {
        $bucket = Bucket::create([
            "wish" => $request->wish,
            "status" => 0,
            "user_id" => Auth::user()->id,
        ]);
        return response()->json($bucket);
    }


    public function update($id)
    {
        $wish = Bucket::find($id);

        if($wish->status == false){
            $wish->update(array('status' => true));

        }else{
            $wish->update(array('status' => false));
        }
        return response()->json();

    }

    public function destroy($id) {
        Bucket::destroy($id);
        return response()->json();

        return back();
    }
}
