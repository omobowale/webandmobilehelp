<?php

use Illuminate\Database\Seeder;
use App\HashTag;

class HashTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $names = ['Tag 1', "Tag 2", "Tag 3", "Tag 4", "Tag 5"];
        $blog_ids = [1, 2, 3, 1, 2];
        foreach($names as $index => $name){
            $hashtag = new HashTag;
            $hashtag->name = $name;
            $hashtag->save();

        }

    }
}
