<?php

use Illuminate\Database\Seeder;
use App\ContactAddress;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addressNames = ["UK: 3 Woodward Close, Grays, Essex, RM17 5RP", "SRI LANKA : 26 2/2 Peterson Lane, Myra Court, Colombo 06, Sri Lanka", "NIGERIA : 42 Adebola Street, Off Adeniran Ogunsanya, Surulere, Lagos"];
        foreach($addressNames as $addressName){
            $address = new ContactAddress;
            $address->address = $addressName;
            $address->save();
        }
    }
}
