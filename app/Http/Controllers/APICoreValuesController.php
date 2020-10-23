<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CoreValue;

class APICoreValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all the corevalues
        $corevalues = CoreValue::all();
        return $corevalues;

    }


}
