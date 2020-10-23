<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * Get the blog that owns the comment.
     */
    public function blog()
    {
        return $this->belongsTo('App\Blog');
    }

    /**
     * Get the commentator that owns the comment.
     */
    public function commentator()
    {
        return $this->belongsTo('App\Commentator');
    }
}
