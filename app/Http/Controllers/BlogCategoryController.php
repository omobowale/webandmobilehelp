<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogCategory;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogcategories = BlogCategory::all();

        return view('blog.category.index')->with("blogcategories", $blogcategories);
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
            'name' => 'string|required'
        ]);

        BlogCategory::create($validated);

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
        $validated = $request->validate([
            'name' => 'string|required'
        ]);

        $blogcategory = BlogCategory::find($id);
        $blogcategory->name = $validated['name'];

        $blogcategory->save();

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
        $blogcategory = BlogCategory::find($id);

        //First delete all of it's blogs
        $blogs = $blogcategory->blogs()->get();

        foreach($blogs as $blog){
            $blog->delete();
        }

        //Then delete the category itself
        if(count($blogs) == 0){
            $blogcategory->delete();
        }

        return back(); 
    }
}
