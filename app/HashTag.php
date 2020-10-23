<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HashTag extends Model
{
    protected $fillable = ['name'];
     /**
     * Get the blogs for the hash tag.
     */
    public function blogs()
    {
        return $this->belongToMany('App\Blog');
    }

}
