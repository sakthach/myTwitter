<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // This user following someone else.

    public function following(){
        return $this->belongsToMany(
            User::class, 'followers', 'user_id', 'following_id'
        );
    }

    public function follower(){
        return $this->belongsToMany(
            User::class, 'followers','following_id', 'user_id'
        );
    }

    public function tweetsFromFollowing(){
        return $this->hasManyThrough(
            Tweet::class, Follower::class, 'user_id','user_id', 'id', 'following_id'
        );
    }


}
