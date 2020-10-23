<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teamNames = ["Aisvarya Adeseye", "Adeyemi Adeseye", "Omobowale Otuyiga", "Bukola Oloyede"];
        $teamRoles = ["CEO", "COO", "Software Developer", "Content Writer - Internship"];
        $teamGenders = ["female", "male", "male", "female"];
        $teamPhotos = ["/storage/images/defaultTeamImage.png", "/storage/images/defaultTeamImage2.png"];
        foreach($teamNames as $index => $teamName){
            $team = new Team;
            $team->name = $teamName;
            $team->role = $teamRoles[$index];
            $team->gender = $teamGenders[$index];
            if($teamGenders[$index] == "female"){
                $team->photo = $teamPhotos[1];
            }
            else{
                $team->photo = $teamPhotos[0];
            }
            $team->save();
        }
    }
}
