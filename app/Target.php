<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;



class Target extends Model
{

    protected $fillable = ['goal'];

    public function due()
    {
        $datetime = new DateTime('2019/4/17 13:37:00');
        $current = new DateTime();
        
        $due = $current->diff($datetime);
        return $due;
    }
}


