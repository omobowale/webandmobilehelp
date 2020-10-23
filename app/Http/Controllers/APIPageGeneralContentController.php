<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageGeneralContent;

class APIPageGeneralContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all the corevalues
        $pagecontent = PageGeneralContent::all();
        return $pagecontent;

    }


}
