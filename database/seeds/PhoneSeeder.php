<?php

use App\ContactPhoneNumber;
use Illuminate\Database\Seeder;

class PhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $phoneNumbers = ["+442039502729", "+94786798715", "+2347038547550"];
        foreach($phoneNumbers as $phoneNumber){
            $phone = new ContactPhoneNumber;
            $phone->phone = $phoneNumber;
            $phone->save();
        }
    }
}
