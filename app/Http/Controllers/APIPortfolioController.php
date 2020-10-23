<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Portfolio;


class APIPortfolioController extends Controller
{
    //
    public function index(){

        $portfolios = Portfolio::all();

        return $portfolios;

    }
}
