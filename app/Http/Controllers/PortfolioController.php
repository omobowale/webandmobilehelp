<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Portfolio;
use App\Category;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all the services
        $portfolios = Portfolio::all();
        $categories = Category::all();
        return view('portfolio.index')->with(["portfolios"=> $portfolios, "categories" => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return the view to create a new service.
        return view('portfolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('portfolio_image')){

            if($request->file('portfolio_image')->isValid()){
                $validated = $request->validate([
                    'portfolio_image' => 'mimes:jpeg,png,jpg|max:2048|required',
                    'name' => 'string|required|min:4',
                    'short_description' => 'string|required',
                    'portfolio_link' => 'string|required|url',
                    'category' => 'string|required'
                ]);

                

                $extension = $request->portfolio_image->extension();
                $storeAs = $validated['name'].time(). "." . $extension;
                $request->portfolio_image->storeAs('./public/portfolioimages', $storeAs);
                $url = Storage::url("portfolioimages/" .$storeAs);

                $portfolio = Portfolio::create([
                    'name' => $validated['name'],
                    'imageUrl' => $url,
                    'short_description' => $validated['short_description'],
                    'category' => $validated['category'],
                    'portfolio_link' => $validated['portfolio_link']
                ]);

                return back();

            }

        }

        return "error adding portfolio";
       

        //return the portfolio with a 201 - Object created - code
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find a service based on its id
        $portfolio = Portfolio::find($id);

        //return the service
        return $portfolio;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
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

        if($request->hasFile('portfolio_image')){

            if($request->file('portfolio_image')->isValid()){
                $validated = $request->validate([
                    'portfolio_image' => 'mimes:jpeg,png,jpg|max:2048|required',
                    'name' => 'string|required|min:4',
                    'short_description' => 'string|required',
                    'portfolio_link' => 'string|required|url',
                    'category' => 'string|required'
                ]);

                

                $extension = $request->portfolio_image->extension();
                $storeAs = $validated['name'].time(). "." . $extension;
                $request->portfolio_image->storeAs('./public/portfolioimages', $storeAs);
                $url = Storage::url("portfolioimages/" .$storeAs);

                $portfolio = Portfolio::find($id);
                $portfolio->name = $validated['name'];
                $portfolio->imageUrl = $url;
                $portfolio->short_description = $validated['short_description'];
                $portfolio->category = $validated['category'];
                $portfolio->portfolio_link = $validated['portfolio_link'];
                $portfolio->save();
        

                return back();

            }

        }

        else{
            $validated = $request->validate([
                'name' => 'string|required|min:4',
                'short_description' => 'string|required',
                'portfolio_link' => 'string|required|url',
                'category' => 'string|required'
            ]);

            $portfolio = Portfolio::find($id);
            $portfolio->name = $validated['name'];
            $portfolio->short_description = $validated['short_description'];
            $portfolio->category = $validated['category'];
            $portfolio->portfolio_link = $validated['portfolio_link'];
                
            $portfolio->save();

            return back();

        }

        
        //return the portfolio with a 201 - Object created - code
        return "error updating portfolio";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the portfolio to be deleted using its id
        $portfolio = Portfolio::find($id);

        //delete the portfolio
        $portfolio->delete();

        //return a null with 204 - No content - code
        return back();
    }

    
}
