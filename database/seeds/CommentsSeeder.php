<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $comment_contents = ["Duis in adipisicing culpa minim laboris labore ipsum laborum aliquip nisi Lorem. Sit dolor nostrud elit occaecat fugiat est. Laboris ex ex culpa officia aliqua cupidatat ut qui eiusmod commodo qui consequat tempor quis. Eiusmod id nostrud quis ad exercitation laboris magna consequat amet veniam incididunt. Sit enim aliqua mollit eiusmod exercitation consectetur fugiat nisi sunt. Dolore sunt elit mollit dolore ullamco amet officia.", "Sit ex est non magna nisi veniam pariatur. Culpa deserunt non eu ad ea dolore aute ut. Enim reprehenderit est nulla labore minim adipisicing.", "Anim incididunt occaecat occaecat velit officia sit veniam Lorem est anim exercitation. Eiusmod do nulla esse esse sint consequat laboris incididunt nostrud cillum ex Lorem deserunt sunt. Exercitation cillum sunt labore excepteur dolor exercitation. Reprehenderit dolore ad id deserunt labore eiusmod cillum amet ipsum cillum cupidatat amet commodo. Nostrud sit aute quis sit ipsum officia do nisi laborum. Nulla consectetur est ex sint eu amet consequat exercitation ut Lorem et ad Lorem qui."];
        $blog_ids = [1, 2, 1];
        $commentator_ids = [1, 2, 1];

        foreach($comment_contents as $index => $comment_content){

            $comment = new Comment;
            $comment->comment_content = $comment_content;
            $comment->blog_id = $blog_ids[$index];
            $comment->commentator_id = $commentator_ids[$index];

            $comment->save();

        }



    }
}
