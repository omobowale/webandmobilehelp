<?php

use App\ContactEmailAddress;
use Illuminate\Database\Seeder;

class EmailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $emailAddresses = ["info@brilloconnetz.com"];
        foreach($emailAddresses as $emailAddress){
            $email = new ContactEmailAddress;
            $email->email = $emailAddress;
            $email->save();
        }
    }
}
