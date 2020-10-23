<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logo;

class APILogoController extends Controller
{
    public function index(){

        $logos = Logo::all();
        return response()->json($logos);

    }
    
}
