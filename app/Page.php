<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable =  ['name', 'title', 'description', 'meta_title', 'meta_description'];
}
