<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blog_category_ids = [1, 2, 3];
        $titles = ["Sunt consectetur excepteur est qui Lorem cillum minim ad amet aliquip.", "Fugiat cupidatat cupidatat labore nulla enim enim est aliquip ea eiusmod eu duis anim.", "Do ipsum est labore elit consectetur adipisicing ut."];
        $contents = ["Ullamco occaecat aliqua eu consectetur Lorem cupidatat eiusmod aliquip cupidatat irure. Eiusmod in incididunt ullamco cillum aliquip veniam enim cupidatat deserunt sunt eu mollit. Sit sit ad eu consequat tempor Lorem est consequat ea. Est duis ea tempor dolore sint sunt duis consequat culpa in. Nostrud et nisi id magna. Quis non enim proident incididunt elit occaecat deserunt nulla ipsum esse cillum in. Commodo sit mollit dolor esse laborum fugiat.", "Cupidatat laborum aliqua mollit aute proident ipsum ut esse qui cillum. Elit non excepteur officia anim enim aute sit anim ut velit eu. Lorem cillum tempor ad amet do elit consequat ad et cupidatat consectetur.", "Exercitation ad ea nulla consectetur adipisicing culpa et eu laboris proident amet. Adipisicing nulla non ullamco laboris culpa deserunt duis ipsum incididunt quis minim. Ut sunt anim ad nostrud irure anim ad elit laborum aliquip velit."];
        $meta_titles = ["meta title 1", "meta title 2", "meta title 3"];
        $meta_descriptions = ["meta description 1", "meta description 2", "meta description 3"];

        foreach($blog_category_ids as $index => $blog_category_id){
            
            $blog = new Blog;
            $blog->blog_category_id = $blog_category_id;
            $blog->title = $titles[$index];
            $blog->slug = $this->getSlug($titles[$index]);
            $blog->content = $contents[$index];
            $blog->meta_title = $meta_titles[$index];
            $blog->meta_description = $meta_descriptions[$index];

            $blog->save();
        }
    }

    public function getSlug($string){
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars
    }
}
