<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PortfolioContent;


class APIPortfolioContentController extends Controller
{
    //
    public function index(){

        $portfoliocontent = PortfolioContent::all();
        return $portfoliocontent;
    }
}
