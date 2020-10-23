<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class APIServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all the services
        $services = Service::all();
        return $services;

    }


}
