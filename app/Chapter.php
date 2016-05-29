<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function comments()
    {
        return $this->hasMany('App\ChapterComment');
    }
}
