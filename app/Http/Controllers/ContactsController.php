<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index')->with("contacts", $contacts);
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
        $validated = $request->validate([
            'location'  => 'string|required',
            'address' => 'string|required',
            'email' => 'email|min:5|required',
            'email_contactable' => 'string|max:3|required',
            'phone' => 'string|required'

        ]);


        //Check if email is set to contactable
        if($validated['email_contactable'] == "yes"){
            $validated['email_contactable'] = 1;
        }

        else{
            $validated['email_contactable'] = 0;
        }

        $contact = Contact::create($validated);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'location'  => 'string|required',
            'address' => 'string|required',
            'email' => 'email|min:5|required',
            'email_contactable' => 'string|max:3|required',
            'phone' => 'string|required'

        ]);

        if($validated['email_contactable'] == "yes"){
            $validated['email_contactable'] = 1;
        }

        else{
            $validated['email_contactable'] = 0;
        }

        $contact = Contact::find($id);
        $contact->location = $validated['location'];
        $contact->address = $validated['address'];
        $contact->email = $validated['email'];
        $contact->email_contactable = $validated['email_contactable'];
        $contact->phone = $validated['phone'];

        $contact->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Get the specific contact to be deleted
        $contact = Contact::find($id);

        $contact->delete();

        return back();
    }
}
