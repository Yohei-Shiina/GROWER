<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Target extends Model
{

    protected $fillable = ['goal', 'date', 'time', 'user_id'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function due()
    {
        $date = strval($this->date);
        $time = strval($this->time);
        $date_time = $date . " " . $time;
        $dateTime = new DateTime($date_time);
        $now = new DateTime("now");
        
        if ($dateTime > $now == true) {
            // 期限が現在よりも未来
            $diff = $now->diff($dateTime);
            return $diff->format("%d日%h時間%i分");
        } else{
            // 期限が現在よりも過去
            return "期限終了";
        }
    }
    public function passedTime()
    {
        $now = new DateTime('now');
        $createdTime = new DateTime($this->created_at);
        return $createdTime->diff($now)->format('%h時間%i分');
        
    }
}