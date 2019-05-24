<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Target extends Model
{

    protected $fillable = ['goal', 'date', 'time', 'user_id', 'status'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function dueTime()
    {
        $date = strval($this->date);
        $time = strval($this->time);
        $date_time = $date . " " . $time;
        $dateTime = new DateTime($date_time);
        $now = new DateTime("now");
        
        if ($dateTime > $now == true) {
            // 期限が現在よりも未来
            $diff = $now->diff($dateTime);

            if($diff->y > 0){
                return $diff->format("%y年%mヶ月%d日");
            } elseif ($diff->m > 0) {
                return $diff->format("%mヶ月%d日");
            } elseif ($diff->d > 0) {
                return $diff->format("%d日%h時間");
            } elseif ($diff->h > 0) {
                return $diff->format("%h時間%i分");
            } else {
                return $diff->format("%i分");
            }
            // } else {
            //     return $diff->format("%s秒");
            // }

        } else{
            // 期限が現在よりも過去
            return "時間切れ";
        }
    }
    public function passedTime()
    {
        $now = new DateTime('now');
        $createdTime = new DateTime($this->created_at);
        $passedTime = $createdTime->diff($now)->format('%h時間%i分');
        return $passedTime;
        
    }
}