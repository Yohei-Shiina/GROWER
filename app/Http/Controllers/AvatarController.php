<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function upload(Request $request) {
        if($request->file('image') === null) {
            return back();
        }
        $file = $request->file('image');
        $user = Auth::user();
        $disk = Storage::disk('s3');
        // S３に保存
        $path = $disk->putFile("/", $file, "public");

        // 設定画像があればS3から削除する
        // 削除じゃなくて上書きできそう　リファクタリング余地あり
        if ($user->avatar) {
            $disk->delete($user->avatar->image);
        }
        $user->avatar->update([
            "image" => $path,
        ]);
        back();
    }
}
