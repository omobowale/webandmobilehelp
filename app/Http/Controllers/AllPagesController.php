<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageGeneralContent;
// use App\Content;


class AllPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pages = Page::all();
        // $contents = Content::all();
        // return view('pages.homepage.index')->with(['pages'=> $pages, 'contents' => $contents]);
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
        // //find a page based on its id
        // $page = Page::find($id);

        // //return the page
        // return $page;
    
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
        if($request->has('page_meta_title') && $request->has('page_meta_description')){

            $validated = $request->validate([
                'page_meta_title' => 'string|required',
                'page_meta_description' => 'string|required',
            ]);
    
             //get the page to be updated using its id
             $pagecontent = PageGeneralContent::find($id);
    
             //update the page
             $pagecontent->meta_title = $validated['page_meta_title'];
             $pagecontent->meta_description = $validated['page_meta_description'];
             
             $pagecontent->save();

             return back();
    

        }

        $validated = $request->validate([
            'page_introduction' => 'string|required',
            'page_button_text' => 'string|required',
            'page_button_link' => 'string|required',

        ]);

         //get the page to be updated using its id
         $pagecontent = PageGeneralContent::find($id);

         //update the page
         $pagecontent->introduction = $validated['page_introduction'];
         $pagecontent->button_text = $validated['page_button_text'];
         $pagecontent->button_link = $validated['page_button_link'];

         $pagecontent->save();
 
         //return the updated page with a 200 - OK - code
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
