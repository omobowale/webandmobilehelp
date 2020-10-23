<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoreValue extends Model
{
    //

    public function getCoreValues(){
        $corevalues = $this->all();

        return $corevalues;
        
    }
}
