<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    //
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'user_id',
        'title',
        'body',
        'is_admin'
    ];

    /**
     * Relationship with user
     */
    # Inverse Relationship
    public function user(){
        return $this->belongsTo('App\User');
    }

    //Poly

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable');
    }

}
