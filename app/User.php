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
     * Elequent Relationship with Post Model one to One relationship
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
     /**
     * many to many relationship
     */
    public function roles(){
        //return $this->belongsToMany('App\Role');

        //If custom column Or Table name FK "@nameSpace, @tableName, @columnName, @columnName"
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id')->withPivot('created_at');
    }
//Belongs to
    public function user(){
        return $this->belongsTo('App\User');
    }
    //Poly
    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }
}
