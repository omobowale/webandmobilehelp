<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    protected $fillable = ["name", "url", "current", "alt"];

    public function getCurrentLogo(){
        $logos = $this->all();
        foreach($logos as $logo){
            if($logo->current == "1"){
                return $logo;
            }
        }

        return $logos[0];
        
    }
}
