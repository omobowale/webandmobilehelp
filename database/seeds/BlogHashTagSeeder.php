<?php

use Illuminate\Database\Seeder;
use App\BlogHashTag;

class BlogHashTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $blog_ids = [1, 2, 3, 1, 2];
        $hashtag_ids = [1, 2, 1, 3, 1];
        foreach($blog_ids as $index => $blog_id){
            $bloghashtag = new BlogHashTag;
            $bloghashtag->blog_id = $blog_id;
            $bloghashtag->hashtag_id = $hashtag_ids[$index];
            $bloghashtag->save();
        }
    }
}
