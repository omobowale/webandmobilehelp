<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Blog;
use App\HashTag;
use App\BlogHashTag;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(5);
        return view("blog.index")->with(["blogs" => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("blog.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasFile('blog_image')){

            if($request->file('blog_image')->isValid()){
                $validated = $request->validate([
                    'blog_image' => 'mimes:jpeg,png,jpg|max:2048|required',
                    'title' => 'string|required|min:2',
                    'blog_category_id' => 'string|required',
                    'hash_tags' => 'string|nullable|min:2',
                    'content' => 'string|required|min:2',
                    'meta_title' => 'string|required',
                    'meta_description' => 'string|required',
                ]);           

                $extension = $request->blog_image->extension();
                $storeAs = $validated['title'].time(). "." . $extension;
                $request->blog_image->storeAs('./public/blogimages', $storeAs);
                $url = Storage::url("blogimages/" .$storeAs);

                $blog = Blog::create([
                    'title' => $validated['title'],
                    'blog_image_url' => $url,
                    'content' => $validated['content'],
                    'slug' => $this->getSlug($validated['title']),
                    // 'hash_tags' => $validated['hash_tags'],
                    'meta_title' => $validated['meta_title'],
                    'meta_description' => $validated['meta_description'],
                    'blog_category_id' => $validated['blog_category_id'],
                ]);

                //store the hash tags
                $this->splitAndStore($validated['hash_tags'], $blog->id);

                return redirect('/blog');

            }

        }

        else {
            $validated = $request->validate([
                'title' => 'string|required|min:2',
                'blog_category_id' => 'string|required',
                'hash_tags' => 'string|nullable|min:2',
                'content' => 'string|required|min:2',
                'meta_title' => 'string|required',
                'meta_description' => 'string|required',
            ]);

            $blog = Blog::create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'slug' => $this->getSlug($validated['title']),
                // 'hash_tags' => $validated['hash_tags'],
                ' meta_title' => $validated['meta_title'],
                'meta_description' => $validated['meta_description'],
                'blog_category_id' => $validated['blog_category_id'],
            ]);

            //store the hash tags
            $this->splitAndStore($validated['hash_tags'], $blog->id);

            return redirect('/blog');

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
        return view('blog.show')->with("blog", $blog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view("blog.edit")->with("blog", $blog);
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
        if($request->hasFile('blog_image')){

            if($request->file('blog_image')->isValid()){
                $validated = $request->validate([
                    'blog_image' => 'mimes:jpeg,png,jpg|max:2048|required',
                    'title' => 'string|required|min:2',
                    'blog_category_id' => 'string|required',
                    'hash_tags' => 'string|nullable|min:2',
                    'content' => 'string|required|min:2',
                    'meta_title' => 'string|required',
                    'meta_description' => 'string|required',
                ]);           

                $extension = $request->blog_image->extension();
                $storeAs = $validated['title'].time(). "." . $extension;
                $request->blog_image->storeAs('./public/blogimages', $storeAs);
                $url = Storage::url("blogimages/" .$storeAs);

                  //store the hash tags
                $this->splitAndStore($validated['hash_tags'], $id);
                
                $blog = Blog::find($id);

                $blog->title = $validated['title'];
                $blog->blog_category_id = $validated['blog_category_id'];
                $blog->content = $validated['content'];
                $blog->slug = $this->getSlug($validated['title']);
                $blog->blog_image_url = $url;
                // $blog->hash_tags = $validated['hash_tags'];
                $blog->meta_title = $validated['meta_title'];
                $blog->meta_description = $validated['meta_description'];
                $blog->save();

                return redirect('/blog');

            }

        }

        else {
            $validated = $request->validate([
                'title' => 'string|required|min:2',
                'blog_category_id' => 'string|required',
                'hash_tags' => 'string|nullable|min:2',
                'content' => 'string|required|min:2',
                'meta_title' => 'string|required',
                'meta_description' => 'string|required',
            ]);


              //store the hash tags
              $this->splitAndStore($validated['hash_tags'], $id);
            
                $blog = Blog::find($id);
                $blog->title = $validated['title'];
                $blog->blog_category_id = $validated['blog_category_id'];
                $blog->content = $validated['content'];
                $blog->slug = $this->getSlug($validated['title']);
                // $blog->hash_tags = $validated['hash_tags'];
                $blog->meta_title = $validated['meta_title'];
                $blog->meta_description = $validated['meta_description'];
                $blog->save();

            return redirect('/blog');

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
        //
        $blog = Blog::find($id);

        if($blog != null){
            //first delete all comments associated with the blog
            $comments = $blog->comments()->get();
            if(count($comments) > 0){
                foreach($comments as $comment){
                    $comment->delete();
                }
            }
            
            $blog->delete();
        }
        
        return redirect('/blog');
    }


    // Other functions
    public function splitAndStore($hashtags, $id){

        //split at commas
        $HashArray = explode(',', $hashtags);
        $newHashArray = array();


        //Get blog
        $bloghashtags = BlogHashTag::where('blog_id', $id)->get();

        //Delete all hash tags
        if($bloghashtags !== null) {
            foreach($bloghashtags as $tag){
                $tag->delete();
            }
        }

        //convert to uppercase
        foreach($HashArray as $hashtag){
            array_push($newHashArray, ucwords($hashtag));
        }


        foreach($newHashArray as $hashtag){
            $newTag = HashTag::where('name', $hashtag)->first();
            if($newTag === null){
                $ht = new HashTag;
                $ht->name = $hashtag;
                $ht->save();

                $bloghashtag = new BlogHashTag;
                $bloghashtag->blog_id = $id;
                $bloghashtag->hashtag_id = $ht->id;
                $bloghashtag->save();
            }

            else{
                $bloghashtag = new BlogHashTag;
                $bloghashtag->blog_id = $id;
                $bloghashtag->hashtag_id = $newTag->id;
                $bloghashtag->save();
            }

            // $count++;
            
        }


        // $count = 0;

        // //get current hashtags
        // $blog = Blog::find($id);

        // $tagarray = array();

        // $currenthashtags = $blog->hashtags()->get();
        // foreach($currenthashtags as $tag) {
        //     array_push($tagarray, $tag->name);
        // }

        // $diffArray = array();

        // foreach($newHashArray as $tag){
        //     if(!in_array($tag, $tagarray)){
        //         array_push($diffArray, $tag);
        //     }
        // }

        // foreach($diffArray as $hashtag){
        //     $newTag = HashTag::where('name', $hashtag)->first();
        //     if($newTag === null){
        //         $ht = new HashTag;
        //         $ht->name = $hashtag;
        //         $ht->save();

        //         $bloghashtag = new BlogHashTag;
        //         $bloghashtag->blog_id = $id;
        //         $bloghashtag->hashtag_id = $ht->id;
        //         $bloghashtag->save();
        //     }

        //     else{
        //         $bloghashtag = new BlogHashTag;
        //         $bloghashtag->blog_id = $id;
        //         $bloghashtag->hashtag_id = $newTag->id;
        //         $bloghashtag->save();
        //     }

        //     // $count++;
            
        // }
      

        // $count = 0;
        // $checkArray = array();
        
        // foreach($newHashArray as $hashtag){
        //     // array_push($tagarray, $tag->name);
        //     $upper = ucwords($hashtag);

        //     if((in_array($upper, $tagarray))){
        //         $bloghashtag = new BlogHashTag;
        //         $bloghashtag->blog_id = $id;
        //         $bloghashtag->hashtag_id = $tag->id;
        //         $bloghashtag->save();
        //     }

        // }

        // return $count;

        
        // foreach($HashArray as $hashtag){
        //     $uppercase = ucwords($hashtag);
        //     $tag = HashTag::where('name', $uppercase)->first();
        //     if($tag === null){
        //         $tag = new HashTag;
        //         $tag->name = $uppercase;
        //         $tag->save();

        //         $hashtag_id = $tag->id;
        //         $blog_id = $id;

        //         $bloghashtag = BlogHashTag::where(['blog_id' => $blog_id, 'hashtag_id' => $hashtag_id])->first();
        //         if($bloghashtag === null){
        //             $bloghashtag = new BlogHashTag;
        //             $bloghashtag->blog_id = $blog_id;
        //             $bloghashtag->hashtag_id = $hashtag_id;
        //             $bloghashtag->save();
        //         }

        //     }

        // }

    }


    public function getSlug($string){
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars
    }
}