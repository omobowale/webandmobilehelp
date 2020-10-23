<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HomeContent;
use App\PageGeneralContent;

class HomeContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homecontent = HomeContent::all();
        $pagecontent = PageGeneralContent::find(1);

        return view('pages.homepage.index')->with(["homecontent" => $homecontent, "pagecontent" => $pagecontent]);
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
        $validated = $request->validate([
            'section_title'  => 'string|nullable',
            'section_description' => 'string|nullable',
            'section_button_text' => 'string|nullable',
            'section_button_link' => 'string|nullable',
        ]);

        $content = HomeContent::find($id);
        $content->section_title = $validated['section_title'];
        $content->section_description = $validated['section_description'];
        $content->section_button_text = $validated['section_button_text'];
        $content->section_button_link = $validated['section_button_link'];
        
        $content->save();

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
