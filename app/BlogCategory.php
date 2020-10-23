<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $fillable = ["name"];
    /**
     * Get the blogs for the category.
     */
    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }
}


