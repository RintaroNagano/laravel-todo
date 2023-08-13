<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['todo_id', 'body'];

    //
    public function todo()
    {
        return $this->belongsTo('App\Todo');
    }
}
