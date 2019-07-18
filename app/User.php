<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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
        'name', 'email', 'password',
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

    /**
     * Elequent Relationship with Post Model One
     */
    public function post(){
        #if user_id columne name not in post table, then we need to define if
        //return $this->hasOne('App\Post', 'user_ifanyname_id', 'id');
        return $this->hasOne('App\Post'); # "user_id" Bydefoult column for relationship

    }
    /**
     * one to many relationship
     */
    public function posts(){
        return $this->hasMany('App\Post');
    }
}
