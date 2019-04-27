<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;

class Target extends Model
{

    protected $fillable = ['goal', 'date', 'time'];

    public function due()
    {
        $datetime = new DateTime($this->date);
        $current = new DateTime();
        
        $due = $current->diff($datetime);
        return $due;
    }
}