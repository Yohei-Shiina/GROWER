<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['target_id', 'task', 'status'];

    public function Target()
    {
        return $this->belongsTo(Target::class);
    }
}
