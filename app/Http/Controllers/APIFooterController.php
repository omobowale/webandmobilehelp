<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;

class APIFooterController extends Controller
{
    public function index(){

        $footer = Footer::all();
        return $footer;
        
        
    }
}
