<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Comment;
use App\Commentator;
use App\Blog;
use Illuminate\Support\Facades\Validator;

class APICommentController extends Controller
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

            $validated = Validator::make($request->all(), [
                'comment' => 'required|string',
                'blog_id' => 'required|numeric',
                'name' => 'required|string|regex:[A-Za-z]',
                'email' => 'required|email'
            ],
            );

            if($validated->fails()){
                return response()->json(['error' => 'check your inputs']);
            }

            //Store the commentator if it doesn't already exist
            $commentator = Commentator::where('email', $request['email'])->first();

            if($commentator === null){
                $commentator = new Commentator;
                $commentator->name = strip_tags($request['name']);
                $commentator->email = strip_tags($request['email']);
                $commentator->save();
            }

            // return response()->json(["commentator" => $commentator]);
            //get the id after storage
            $id = $commentator->id;


            $comment = new Comment;
            $comment->commentator_id = $id;
            $comment->comment_content = strip_tags($request['comment']);
            $comment->blog_id = $request['blog_id'];

            $status = $comment->save();
        // }
        if($status === true){
            return response()->json(["success" => "Comment has been sent. This will appear in the comment section once approved"]);
        }

        else{
            return response()->json(["error" => "Comment could not be sent. Please try again later"]);
        }


        return response();
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
