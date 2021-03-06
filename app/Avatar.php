<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = ['image', 'user_id'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
