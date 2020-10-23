<?php

use App\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
            $user = new User;
            $user->name = "Omobowale";
            $user->email = "omobowale.otuyiga@academicianhelp.com";
            $user->status = true;
            $user->password = Hash::make("147258stiga");
            $user->api_token = "aMXByKd9S116MLic0yK8B1y14Ld5KsWYy65idwhLw8b49jyEDxEEfcyWddv1";
            $user->role = "superadmin";
            $user->save();

            $user = new User;
            $user->name = "Adeyemi";
            $user->email = "adeyemi@brilloconnetz.com";
            $user->status = true;
            $user->password = Hash::make("adeyemi123");
            $user->api_token = "aMXByKd9S116MLic0yK8B1y14Ld5KsWYy65idwhLw8b49jyEDxEEfcyWddvf";
            $user->role = "superadmin";
            $user->save();
       
    }
}
