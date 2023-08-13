<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
    public function comment()
    {
        return $this->hasOne('App\Comment');
    }

}
