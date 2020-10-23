<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentator extends Model
{
    /**
     * Get the comments for the commentator.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
