<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;

class APITeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all the team members
        $members = Team::all();
        return $members;
    }

}
