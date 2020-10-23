<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;


class APIBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        // foreach($blogs as $blog){
        //     $newDate = date('d/m/Y', strtotime($blog->created_at));
        //     $blog->created_at = $newDate;
        // }

        $comments = array(); 
        $commentators = array();
        foreach($blogs as $blog){
            array_push($comments, $blog->comments);
            foreach($blog->comments as $comment){
                array_push($commentators, $comment->commentator);
            }
        }

        // $approvedcomments = array();
        // foreach($comments as $comment){
        //     foreach($comment as $c){
        //         if($c->status === "Approved"){
        //             array_push($approvedcomments, $c);
        //         }
        //     }
        //     // }
        // }

        //return $approvedcomments;

        $categories = array();
        foreach($blogs as $blog){
            array_push($categories, $blog->category);
        }

        $tags = array();
        foreach($blogs as $blog){
            array_push($tags, $blog->hashtags);
        }
        
        // return response()->json(["blog" => $blogs]);
        return response()->json(["blog" => $blogs, "comments" => $comments, "commentators" => $commentators, "categories" => $categories, "hashtags" => $tags]);

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
