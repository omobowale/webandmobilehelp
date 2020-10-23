<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContactContent;

class APIContactContentController extends Controller
{
    //
    public function index(){
        $contactcontent = ContactContent::all();

        return $contactcontent;
    }
}
