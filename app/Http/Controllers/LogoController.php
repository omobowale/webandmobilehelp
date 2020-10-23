<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Logo;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::all();

        return view('logo.index')->with("logos", $logos);
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
        if($request->hasFile('logo')){

            if($request->file('logo')->isValid()){
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'logo' => 'mimes:jpeg,png|max:2048',
                    'current' => 'boolean|max:1',
                    'alt' => 'nullable'
                ]);

                $extension = $request->logo->extension();
                $storeAs = $validated['name'].".".time() . "." . $extension;
                $request->logo->storeAs('./public/logo', $storeAs);
                $url = Storage::url("logo/" . $storeAs);

                if($validated['current'] == "1"){
                    $this->setCurrentOfOthersToNo();
                }

                if(empty($validated['alt'])){
                    $validated['alt'] = "BrilloConnetz-logo";
                }

                $logo = Logo::create([
                    'name' => $validated['name'],
                    'url' => $url,
                    'current' => $validated['current'],
                    'alt' => $validated['alt']
                ]);

                return back();

            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $logo = Logo::find($id);

        return $logo;
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
        
        if($request->hasFile('logo')){

            if($request->file('logo')->isValid()){
                $validated = $request->validate([
                    'name' => 'string|max:40',
                    'logo' => 'mimes:jpeg,png|max:2048',
                    'current' => 'boolean|max:1',
                    'alt' => 'nullable'
                ]);

                $extension = $request->logo->extension();
                $storeAs = $validated['name'].".".time() . "." . $extension;
                $request->logo->storeAs('./public/logo', $storeAs);
                $url = Storage::url("logo/" . $storeAs);

                $logo = Logo::find($id);
                $logo->name = $validated['name'];
                $logo->current = $validated['current'];
                if(empty($validated['alt'])){
                    $validated['alt'] = "BrilloConnetz-logo";
                }
                $logo->alt = $validated['alt'];
                $logo->url = $url;

                if($validated['current'] == "1"){
                    $this->setCurrentOfOthersToNo();
                }

                

                $logo->save();


            }

        }
        else {
            $validated = $request->validate([
                'name' => 'string|max:40',
                'logo'=> 'nullable',
                'current' => 'boolean|max:1',
                'alt' => 'nullable'
            ]);

            $logo = Logo::find($id);
            $logo->name = $validated['name'];
            $logo->current = $validated['current'];
            if(empty($validated['alt'])){
                $validated['alt'] = "BrilloConnetz-logo";
            }
            $logo->alt = $validated['alt'];
            if($validated['current'] == "1"){
                $this->setCurrentOfOthersToNo();
            }
            $logo->save();

        }

       

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
        $logo = Logo::find($id);
        $logo->delete();
        return back();
    }

    public function setCurrentOfOthersToNo(){
        $logos = Logo::all();
        foreach($logos as $logo){
            $logo->current = 0;
            $logo->save();
        }
    }
}
