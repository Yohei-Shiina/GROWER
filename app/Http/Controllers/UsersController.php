<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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
        $current_user_id = Auth::user()->id;
        if ($id != Auth::user()->id) {
            return redirect("/users/{$current_user_id}");
        } else {
        $user = Auth::user();
        $targets = User::find($id)->targets()->get();
        return view('users.show')->with(array('targets' => $targets, 'user' => $user));
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
