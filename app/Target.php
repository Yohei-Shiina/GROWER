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
        $datetime = new DateTime($this->date);
        $current = new DateTime();
        
        $due = $current->diff($datetime);
        return $due;
    }
}