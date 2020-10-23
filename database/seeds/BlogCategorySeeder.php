<?php

use Illuminate\Database\Seeder;
use App\BlogCategory;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $names = ["Category 1", "Category 2", "Category 3"];

        foreach($names as $name){
            $blogcategory = new BlogCategory;
            $blogcategory->name = $name;
            $blogcategory->save();
        }

    }
}
