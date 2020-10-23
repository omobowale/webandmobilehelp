<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable =  ['name', 'icon', 'short_description', 'meta_title', 'meta_description', 'details', 'slug'];
}
