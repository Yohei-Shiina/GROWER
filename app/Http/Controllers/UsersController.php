<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function getLogout() {
        Auth::logout();
        return redirect('/login');
    }

    public function show($id) {   
        if(User::find($id)){
            $user = Auth::user();
            // 不正アクセスの時
            if ($id != $user->id) {
                
                return back();
            // 正しいアクセスの時
            } else {
                $targets = $user->targets()->get();
                $disk = Storage::disk('s3');

                // 画像あれば
                if($user->avatar){
                    $image = $disk->url($user->avatar->image);
                }
                // 画像がなければ
                else{
                    $image = $disk->url("NoImage.png");
                }
                return view('users.show')->with(array('targets' => $targets, 'user' => $user, 'image'=> $image));
            }
        }else{
            return back();
        }
    }
}
