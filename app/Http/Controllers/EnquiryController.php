<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Mail\ContactMail;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $validated = $request->validate([
            'firstname' => 'string|min:4|required',
            'lastname' => 'string|min:4|required',
            'email' => 'email|min:4|required',
            'message' => 'string|min:4|required',

        ]);


        $enquiry = new Enquiry;
        $enquiry->firstname = $validated['firstname'];
        $enquiry->lastname = $validated['lastname'];
        $enquiry->email = $validated['email'];
        $enquiry->message = $validated['message'];
        
        //Save enquiry
        $status = $enquiry->save();

        
        //If enquiry saves successfully
        if($status == true){
            //Send mail to the admin
            //First define the admin email
            $admin_email = $this->getContactables();
            
           
            
            //call mailable
            Mail::to($admin_email)->send(new ContactMail($validated));

            return response()->json(["success" => "Your message has been successfully sent. We'll get back to you as soon as possible"]);
            
            
        }

        return response()->json(["error" => "Sorry, your message could not be sent. Please try again later"]);

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }

    public function getContactables(){

        $contactables = Contact::where("email_contactable", 1)->get();
        $emails = array();

        foreach($contactables as $contactable){
            array_push($emails, $contactable->email);
        }

        if(count($emails) < 1){
            return "omobowale.otuyiga@academicianhelp.com";
        }

        return $emails;

    }
}


