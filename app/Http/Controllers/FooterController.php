<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Footer;
use App\Settings;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::find(1);
        return view('footer.index')->with("footer", $footer);
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
            'webname' => 'string|required|min:2',
            'webdescription' => 'string|required|min:2',
            'copyrightstatement' => 'string|required|min:2'
        ]);

        $footer = Footer::find($id);
        $footer->webname = $validated['webname'];
        $footer->webdescription = $validated['webdescription'];
        $footer->copyrightstatement = $validated['copyrightstatement'];
        $footer->save();

        //update in the settings too
        $settings = Settings::find($id);
        $settings->webname = $validated['webname'];
        $settings->save();
        
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
        //
    }
}
