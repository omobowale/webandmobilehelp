<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicesContent;

class APIServicesContentController extends Controller
{
    //
    public function index(){

        $servicescontent = ServicesContent::all();
        return $servicescontent;

    }
}
