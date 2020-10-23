<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;


class APIContentController extends Controller
{
    public function index()
    {
        $contents = Content::all();
        return response()->json($contents);
    }

}
