<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
    protected $fillable = ["name", "imageUrl", "portfolio_link", "category", "short_description"];

}
