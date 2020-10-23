<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = ["United Kingdom", "SRI LANKA", "NIGERIA"];
        $addresses = ["3 Woodward Close, Grays, Essex, RM17 5RP", "26 2/2 Peterson Lane, Myra Court, Colombo 06, Sri Lanka", "42 Adebola Street, Off Adeniran Ogunsanya, Surulere, Lagos"];
        $emails = ["info@webandmobilehelp.com", "enquiry@webandmobilehelp.com", "contact@webandmobilehelp.com"];
        $phones = ["+442039502729", "+94786798715", "+2347038547550"];

        foreach($locations as $index => $location){
            $contact = new Contact;
            $contact->location = $location;
            $contact->address = $addresses[$index];
            $contact->email = $emails[$index];
            $contact->phone = $phones[$index];

            $contact->save();
        }
    }
}
