<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
use App\Target;


class ClocksController extends Controller
{
    // Ajax処理による経過時間表示
    public function passedTime(Request $request) {
        $target = Target::find($request->id);
        $now = new DateTime('now');
        $createdTime = new DateTime($target->created_at);
        $passedTime = $createdTime->diff($now)->format('%h時間%i分');
        return response()->json($passedTime);
    }

    // Ajax処理による経過時間表示
    public function dueTime(Request $request) {
        $target = Target::find($request->id);
        $date = strval($target->date);
        $time = strval($target->time);
        $date_time = $date . " " . $time;
        $dateTime = new DateTime($date_time);
        $now = new DateTime("now");
        
        if ($dateTime > $now == true) {
            // 期限が現在よりも未来
            $diff = $now->diff($dateTime);
            if($diff->y > 0){
                $dueTime = $diff->format("%y年%mヶ月%d日");
            } elseif ($diff->m > 0) {
                $dueTime = $diff->format("%mヶ月%d日");
            } elseif ($diff->d > 0) {
                $dueTime = $diff->format("%d日%h時間");
            } elseif ($diff->h > 0) {
                $dueTime = $diff->format("%h時間%i分");
            } else {
                $dueTime = $diff->format("%i分");
            }
            return response()->json($dueTime);
        } else{
            // 期限が現在よりも過去
            return response()->json("時間切れ");
        }
    }
}
