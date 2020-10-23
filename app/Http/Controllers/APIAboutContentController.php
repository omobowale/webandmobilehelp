<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AboutContent;

class APIAboutContentController extends Controller
{
    //
    public function index(){
        $aboutcontent = AboutContent::all();
        return $aboutcontent;
    }
}
