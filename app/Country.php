<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    public function posts(){
        //If column Name diffrent like rule Or
        //return $this->hasManyThrough('App\Post', 'App\User', 'country_id', 'user_id');
        return $this->hasManyThrough('App\Post', 'App\User');
    }
}
