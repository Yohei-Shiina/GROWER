<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bucket;

class BucketsController extends Controller
{
    public function index()
    {
        $wishes = Bucket::all();

        return view('buckets.index')->with('wishes', $wishes);
    }
    
    public function store(Request $request)
    {
        Bucket::create([
            "wish" => $request->wish,
        ]);
        return redirect('buckets.index');
    }
}
