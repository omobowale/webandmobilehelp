<?php

namespace App\Http\Controllers;

use App\ContactPhoneNumber;
use Illuminate\Http\Request;

class ContactPhoneNumbersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phones = ContactPhoneNumber::all();

        return $phones;
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
            'phone' => 'string|min:6|required'
        ]);

        $phone = ContactPhoneNumber::create($request->all());
        return $phone;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactPhoneNumber  $contactPhoneNumber
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phone = ContactPhoneNumber::find($id);
        return $phone;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactPhoneNumber  $contactPhoneNumber
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
     * @param  \App\ContactPhoneNumber  $contactPhoneNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get the phone to be updated using its id
        $phone = ContactPhoneNumber::find($id);

        //update the phone
        $phone->update($request->all());

        //return the updated phone with a 200 - OK - code
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactPhoneNumber  $contactPhoneNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the phone to be deleted using its id
        $phone = ContactPhoneNumber::find($id);

        //delete the phone
        $phone->delete();

        //return a null with 204 - No content - code
        return back();
    }
}
