<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class UsersController extends Controller
{
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function show($id)
    {   
        $targets = User::find($id)->targets()->get();
        return view('users.show')->with('targets', $targets);
    }
}
