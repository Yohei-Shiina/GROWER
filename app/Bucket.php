<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bucket extends Model
{
    protected $fillable = ['wish', 'status'];
    
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
