<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Blog;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if($request->has('admin') && $request['admin'] == 'admin' && Auth::user()){
        $validated = $request->validate([
            'comment_content' => 'required|string',
            'blog_id' => 'required|numeric'
        ]);

            $comment = new Comment;
            $comment->commentator_id = 0;
            $comment->comment_content = $validated['comment_content'];
            $comment->status = "Approved";
            $comment->blog_id = $validated['blog_id'];
            $comment->admin = 'yes';
            $comment->admin_id = Auth::user()->id;

            $comment->save();
        }

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
        $blog = Blog::find($id);
        if($blog != null){
            $comments = $blog->comments()->paginate(5);
            return view('blog.comments.index')->with(["comments" => $comments, "blog" => $blog]);
        }

        return redirect('/');
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
            'status' => 'required|string',
            'comment_content' => 'required|string',
        ]);

        $comment = Comment::find($id);
        $comment->comment_content = $validated['comment_content'];
        $comment->status = $validated['status'];

        $comment->save();

        return back();
    }

    public function updateCommentStatus($id){
        $comment = Comment::find($id);

        if($comment != null) {
            if($comment->status == "Pending"){
                $comment->status = "Approved";
                $comment->save();
            }
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

        $comment = Comment::find($id);
        $comment->delete();

        return back();

    }

}
