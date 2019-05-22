<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getLogout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function show($id)
    {   
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
    
    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => [
                // 必須
                'required',
                // アップロードされたファイルであること
                'file',
                // 画像ファイルであること
                'image',
                // MIMEタイプを指定
                'mimes:jpeg,png',
            ]
        ]);

        if ($request->file('file')->isValid([])) {
            $filename = $request->file->store('public/avatar');

            $user = User::find(auth()->id());
            $user->avatar_filename = basename($filename);
            $user->save();

            return redirect("/users/$user->id")->with('success', '保存しました。');
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        }
    }
}
