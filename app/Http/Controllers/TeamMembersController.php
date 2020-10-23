<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Team;

class TeamMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Team::all();
        return view('team.index')->with("members", $members);
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
       //return $request->hasFile('photo');

        if($request->hasFile('photo')){

            if($request->file('photo')->isValid()){
                $validated = $request->validate([
                    'name' => 'string|max:40|required',
                    'photo' => 'mimes:jpeg,png|max:4048|required',
                    'gender' => 'string|max:6|required',
                    'role' => 'string|max:40|required'
                ]);

                

                $extension = $request->photo->extension();
                $storeAs = $validated['name'].time() . "." . $extension;
                $request->photo->storeAs('./public', $storeAs);
                $url = Storage::url($storeAs);

                $team = Team::create([
                    'name' => $validated['name'],
                    'photo' => $url,
                    'gender' => $validated['gender'],
                    'role' => $validated['role']
                ]);

                return back();

            }

        }

        return "error adding member";
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //find a member based on its id
        $member = Team::find($id);

        //return the member
        return $member;
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
        
        if($request->hasFile('photo')){

            if($request->file('photo')->isValid()){
                $validated = $request->validate([
                    'name' => 'string|max:40|required',
                    'photo' => 'mimes:jpeg,png|max:4048|required',
                    'gender' => 'string|max:6|required',
                    'role' => 'string|max:40|required'
                ]);

                $extension = $request->photo->extension();
                $storeAs = $validated['name'].time() . "." . $extension;
                $request->photo->storeAs('./public', $storeAs);
                $url = Storage::url($storeAs);

                
                $member = Team::find($id);
                $member->name = $validated['name'];
                $member->role = $validated['role'];
                $member->gender = $validated['gender'];
                $member->photo = $url;
                $member->save();


            }

        }
        else {
            $validated = $request->validate([
                'name' => 'string|max:40|required',
                'photo' => 'nullable',
                'gender' => 'string|max:6|required',
                'role' => 'string|max:40|required'
            ]);
            $member = Team::find($id);
            $member->name = $validated['name'];
            $member->role = $validated['role'];
            $member->gender = $validated['gender'];
            $member->save();


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
        //get the team to be deleted using its id
        $team = Team::find($id);

        //delete the team
        $team->delete();

        //return a null with 204 - No content - code
        return back();
    }
}
