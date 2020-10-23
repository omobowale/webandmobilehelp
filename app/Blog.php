<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    protected $fillable = ["title", "blog_category_id", "meta_title", "meta_description", "blog_image_url", "content"];

    /**
     * Get the comments for the blog.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get the category that owns the blog.
     */
    public function category()
    {
        return $this->belongsTo('App\BlogCategory', 'blog_category_id');
    }

    /**
     * Get the hastag that owns the blog.
     */
    public function hashtags()
    {
        return $this->belongsToMany('App\HashTag', 'blog_hash_tags', 'blog_id', 'hashtag_id');
    }

    public function getTags(){
        $tags = $this->hashtags()->get();
        $values = "";
        foreach($tags as $index => $tag){
            if($index == 0)
                $values = $tag->name;
            else
                $values = $values . "," . $tag->name;
        }

        return $values;
    }
}


