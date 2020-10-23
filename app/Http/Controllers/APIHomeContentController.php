<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeContent;

class APIHomeContentController extends Controller
{
    public function index(){
        
        $homecontent = HomeContent::all();
        return $homecontent;

    }
}
