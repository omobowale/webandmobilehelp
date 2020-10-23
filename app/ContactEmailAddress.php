<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactEmailAddress extends Model
{
    protected $fillable = ['email', 'contactable'];
}
