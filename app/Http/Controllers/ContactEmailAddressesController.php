<?php

namespace App\Http\Controllers;

use App\ContactEmailAddress;
use Illuminate\Http\Request;

class ContactEmailAddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = ContactEmailAddress::all();

        return $emails;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email|min:5|required'
        ]);

        $email = ContactEmailAddress::create($request->all());
        return $email;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactEmailAddress  $contactEmailAddress
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $email = ContactEmailAddress::find($id);
        return $email;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactEmailAddress  $contactEmailAddress
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactEmailAddress  $contactEmailAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get the email to be updated using its id
        $email = ContactEmailAddress::find($id);

        //update the email
        $email->update($request->all());

        //return the updated email with a 200 - OK - code
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactEmailAddress  $contactEmailAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the email to be deleted using its id
        $email = ContactEmailAddress::find($id);

        //delete the email
        $email->delete();

        //return a null with 204 - No content - code
        return back();
        
    }
}
