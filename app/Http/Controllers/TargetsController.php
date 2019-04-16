<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Target;

class TargetsController extends Controller
{
    public function index()
    {
        $targets = Target::all();
        return view('targets.index')->with('targets', $targets);
    }
}
