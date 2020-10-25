<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::all();
        return $categories;
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|min:3|required'
        ]);

        $category = Category::create($request->all());
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        return $category;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //get the category to be updated using its id
        $category = Category::find($id);

        //update the category
        $category->update($request->all());
        
        //return the updated category with a 200 - OK - code
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the category to be deleted using its id
        $category = Category::find($id);

        //delete all portfolios under this category
        

        //delete the category
        $category->delete();

        //return a null with 204 - No content - code
        return back();
        
    }


}
