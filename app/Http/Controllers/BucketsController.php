<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bucket;

class BucketsController extends Controller
{
    public function index()
    {
        $buckets = Bucket::all();

        return view('buckets.index')->with('buckets', $buckets);
    }
    
    public function store(Request $request)
    {
        Bucket::create([
            "wish" => $request->wish,
            "status" => "0",
        ]);
        return redirect('/buckets');
    }

    public function destroy($id) {
        Bucket::destroy($id);
        
    
        return redirect('/buckets');
      }
}
