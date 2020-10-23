<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Service;

class AllServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return all the services
        $services = Service::all();
        return view('service.index')->with("services", $services);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return the view to create a new service.
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('icon')){

            if($request->file('icon')->isValid()){
                $validated = $request->validate([
                    'icon' => 'mimes:jpeg,png,jpg|max:2048|required',
                    'name' => 'string|required|min:4',
                    'slug' => 'string|nullable|min:4',
                    'short_description' => 'string|required',
                    'meta_title' => 'string|required',
                    'meta_description' => 'string|required',
                    'details' => 'string|required',
                ]);

                

                $extension = $request->icon->extension();
                $storeAs = $validated['name'].time(). "." . $extension;
                $request->icon->storeAs('./public/servicesimages', $storeAs);
                $url = Storage::url("servicesimages/" .$storeAs);
                //If slug is not set, create slug from service name
                if(empty($validated['slug'])){
                    $validated['slug'] = $this->createSlug($validated['name']);
                }

                $service = Service::create([
                    'name' => $validated['name'],
                    'icon' => $url,
                    'slug' => $validated['slug'],
                    'short_description' => $validated['short_description'],
                    'meta_title' => $validated['meta_title'],
                    'meta_description' => $validated['meta_description'],
                    'details' => $validated['details'],
                ]);

                return back();

            }

        }

        return "error adding service";
       

        //return the service with a 201 - Object created - code
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
        $service = Service::find($id);

        //return the service
        return $service;
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

        if($request->hasFile('icon')){

            if($request->file('icon')->isValid()){
                $validated = $request->validate([
                    'icon' => 'mimes:jpeg,png,jpg|max:2048|required',
                    'name' => 'string|required|min:4',
                    'slug' => 'string|nullable|min:4',
                    'short_description' => 'string|required',
                    'meta_title' => 'string|required',
                    'meta_description' => 'string|required',
                    'details' => 'string|required',
                ]);

                

                $extension = $request->icon->extension();
                $storeAs = $validated['name'].time(). "." . $extension;
                $request->icon->storeAs('./public/servicesimages', $storeAs);
                $url = Storage::url("servicesimages/". $storeAs);
                //If slug is not set, create slug from service name
                if(empty($validated['slug'])){
                    $validated['slug'] = $this->createSlug($validated['name']);
                }

                $service = Service::find($id);
                $service->name = $validated['name'];
                $service->slug = $validated['slug'];
                $service->icon = $url;
                $service->details = $validated['details'];
                $service->meta_title = $validated['meta_title'];
                $service->meta_description = $validated['meta_description'];
                $service->short_description = $validated['short_description'];
                $service->save();
        

                return back();

            }

        }

        else{
            $validated = $request->validate([
                'name' => 'string|required|min:4',
                'slug' => 'string|nullable|min:4',
                'short_description' => 'string|required',
                'meta_title' => 'string|required',
                'meta_description' => 'string|required',
                'details' => 'string|required',
            ]);

            if(empty($validated['slug'])){
                $validated['slug'] = $this->createSlug($validated['name']);
            }

            $service = Service::find($id);
            $service->name = $validated['name'];
            $service->slug = $validated['slug'];
            $service->details = $validated['details'];
            $service->short_description = $validated['short_description'];
            $service->meta_title = $validated['meta_title'];
            $service->meta_description = $validated['meta_description'];
                
            $service->save();

            return back();

        }

        
        //return the service with a 201 - Object created - code
        return "error updating service";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //get the service to be deleted using its id
        $service = Service::find($id);

        //delete the service
        $service->delete();

        //return a null with 204 - No content - code
        return back();
    }

    public function createSlug($string){
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars
    }
}
