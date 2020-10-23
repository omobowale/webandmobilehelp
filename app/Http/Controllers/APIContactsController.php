<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class APIContactsController extends Controller
{
    public function index(){

        $contacts = Contact::all();
        return $contacts;
        
    }
}
