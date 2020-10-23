<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CommonContent;

class APICommonContentController extends Controller
{
    //
    public function index (){
        $commoncontent = CommonContent::all();

        return $commoncontent;
        
    }
}
