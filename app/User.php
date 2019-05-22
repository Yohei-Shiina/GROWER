<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar_filname'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function targets()
    {
        return $this->hasMany(Target::class);
    }
    public function buckets()
    {
        return $this->hasMany(Bucket::class);
    }
    public function avatar()
    {
        return $this->hasOne(Avatar::class);
    }
}
