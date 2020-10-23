<?php

use Illuminate\Database\Seeder;
use App\Commentator;

class CommentatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $names = ["John Doe", "Bit Doe", "Raven Doe"];
        $emails = ["john@gmail.com", "Bit@gmail.com", "Raven@gmail.com"];

        foreach($names as $index => $name){
            $commentator = new Commentator;
            $commentator->name = $name;
            $commentator->email = $emails[$index];

            $commentator->save();
        }

    }
}
