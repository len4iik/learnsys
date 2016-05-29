<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function profile()
    {
        return $this->hasOne('App\Profile', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\ChapterComment');
    }
}
