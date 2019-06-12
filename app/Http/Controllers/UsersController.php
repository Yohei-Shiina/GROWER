<?php

namespace App\Http\Controllers;

use Auth;
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

        $user = Auth::user();
        // 不正アクセスの時
        if ($id != $user->id) {
            return back();

        // 正しいアクセスの時
        } else {
            $targets = $user->targets()->get();
            $disk = Storage::disk('s3');

            // avatar     ?                画像ある場合                 ：      画像ない場合 $imageに代入
            $user->avatar ? $image = $disk->url($user->avatar->image) : $image = $disk->url("NoImage.png");
            return view('users.show')->with(array('targets' => $targets, 'user' => $user, 'image'=> $image));
        }
    }
}