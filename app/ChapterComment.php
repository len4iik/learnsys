<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChapterComment extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function chapter()
    {
        return $this->belongsTo('App\Chapter');
    }
}
