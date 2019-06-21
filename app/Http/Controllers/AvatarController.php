<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Avatar;
use Auth;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function upload(Request $request) {
        if($request->file('image') === null){
            return back();
        }
        $file = $request->file('image');
        $user = Auth::user();
        $disk = Storage::disk('s3');
        
        // まだ画像がなければ
        if ($user->avatar == null){
            // S３に保存
            $path = $disk->putFile("/", $file, "public");
            // DBに保存
            Avatar::create([
                "image" => $path,
                "user_id" => $user->id,
            ]);
        // 画像があれば
        }else{
            // S3から削除
            $disk->delete($user->avatar->image);
            // S３に保存
            $path= $disk->putFile("/", $file, "public");
            // DBを更新
            $user->avatar->update([
                "image" => $path,
            ]);
        }
        return back();
    }
}