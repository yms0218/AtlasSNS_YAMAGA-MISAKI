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
        'username', 'mail', 'password', 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function follow(){
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');
    }

    public function follower(){
        return $this->belongsToMany(User::class,'follows','followed_id','following_id');
    }

    public function isFollowing($id){
        return $this->follow()->where('followed_id', $id)->first();
    }
    public function unfollow(Int $user)
    {
        return $this->follow()->detach($user);
    }
    public function follows(Int $user){
        return $this->follow()->attach($user);
    }
    }

