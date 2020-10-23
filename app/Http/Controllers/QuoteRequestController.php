<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\QuoteRequest;
use App\Mail\QuoteRequestMail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;


class QuoteRequestController extends Controller
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
        $status = false;
        $message_to_be_returned = "";

        if($request->hasFile('requestfile')){


            if($request->file('requestfile')->isValid()){
                $validated = $request->validate([
                    'requestfile' => 'mimes:jpeg,png,jpg,pdf,zip|max:2097152|required',
                    'firstname' => 'string|min:4|required',
                    'lastname' => 'string|min:4|required',
                    'email' => 'email|min:4|required',
                    'message' => 'string|min:4|required',

                ]);

                $extension = $request->requestfile->extension();
                $storeAs = $validated['firstname'].time(). "." . $extension;
                $request->requestfile->storeAs('./public/servicesimages', $storeAs);
                $url = Storage::url("servicesimages/" .$storeAs);

                $actualdata = [
                    "requestfile" => $validated['requestfile'],
                    'firstname' => $validated['firstname'],
                    'lastname' => $validated['lastname'],
                    'email' => $validated['email'],
                    'message' => $validated['message'],
                    'request_file_url' => $url
                ];

                $validated += ['request_file_url' => $url];
                //$validated['request_file_url'] = $url;
//                array_push($validated, ['request_file_url' => $url]);

                $quoterequest = new QuoteRequest;
                $quoterequest->firstname = $validated['firstname'];
                $quoterequest->request_file_url = $url;
                $quoterequest->lastname = $validated['lastname'];
                $quoterequest->email = $validated['email'];
                $quoterequest->message = $validated['message'];
                
                //Save quote request
                $status = $quoterequest->save();

                $message_to_be_returned = "Your request along with your uploaded file has been successfully sent. We'll get back to you as soon as possible";

                
        
               
            }

            



        }else {

            $validated = $request->validate([
                'firstname' => 'string|min:4|required',
                'lastname' => 'string|min:4|required',
                'email' => 'email|min:4|required',
                'message' => 'string|min:4|required',

            ]);

            $quoterequest = new QuoteRequest;
            $quoterequest->firstname = $validated['firstname'];
            $quoterequest->lastname = $validated['lastname'];
            $quoterequest->email = $validated['email'];
            $quoterequest->message = $validated['message'];
            
            //Save quoterequest
            $status = $quoterequest->save();

            $message_to_be_returned = "Your request has been successfully sent. We'll get back to you as soon as possible";

        }

        if($status == true){
            //Send mail to the admin
            //First define the admin email
            // $admin_email = $this->getContactables();

            $admin_email = "stigawithfun@gmail.com";
            
            //call mailable
            Mail::to($admin_email)->send(new QuoteRequestMail($validated));

            

            return response()->json(["success" => $message_to_be_returned]);
            
            
        }

        return response()->json(["error" => "Error in submitting request. Please try again later"]);

        // //If enquiry saves successfully
        // if($status == true){
        //     //Send mail to the admin
        //     //First define the admin email
        //     $admin_email = $this->getContactables();
            
           
            
        //     //call mailable
        //     Mail::to($admin_email)->send(new ContactMail($validated));

        //     return response()->json(["success" => "Your message has been successfully sent. We'll get back to you as soon as possible"]);
            
            
        // }

        // return response()->json(["error" => "Sorry, your message could not be sent. Please try again later"]);

       
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
