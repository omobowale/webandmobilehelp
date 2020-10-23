<?php

namespace App\Http\Controllers;

use App\ContactAddress;
use Illuminate\Http\Request;

class ContactAddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = ContactAddress::all();

        return $addresses;
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
            'address' => 'string|min:5|required'
        ]);

        $address = ContactAddress::create($request->all());
        return $address;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactAddress  $contactAddress
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $address = ContactAddress::find($id);
        return $address;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactAddress  $contactAddress
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
     * @param  \App\ContactAddress  $contactAddress
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get the address to be updated using its id
        $address = ContactAddress::find($id);

        //update the address
        $address->update($request->all());

        //return the updated address with a 200 - OK - code
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactAddress  $contactAddress
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the address to be deleted using its id
        $address = ContactAddress::find($id);

        //delete the address
        $address->delete();

        //return a null with 204 - No content - code
        return back();
        
    }
}
