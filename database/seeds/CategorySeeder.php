<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //all categories
        $categories = ["Web Apps", "Mobile Apps", "Digital Marketing"];

        foreach ($categories as $category){
            $newcategory = new Category;
            $newcategory->name = $category;
            $newcategory->save();
        }
    }
}
