<?php

use Illuminate\Database\Seeder;
use App\AboutContent;

class AboutContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ["About WebAndMobileHelp", "our core values", "our works", "meet the team"];
        $titlesInfo = "Max. characters : 30";
        $descriptions = ["Officia culpa aute anim dolore pariatur culpa. Eiusmod dolor dolore fugiat deserunt labore dolore sunt incididunt qui officia elit. Lorem reprehenderit nulla est est nulla tempor in dolor exercitation irure. Ad cillum officia minim cillum sint irure reprehenderit. Dolore qui velit ad ad tempor enim exercitation nisi nisi aliqua et non cupidatat. Non ipsum commodo labore exercitation fugiat ad pariatur in incididunt consequat.", "In cupidatat ad ut officia culpa Lorem elit consequat magna ad est pariatur in magna.", "Ex do eu cupidatat id sint. Cillum incididunt ut dolor duis. Magna occaecat enim et consequat nisi. Sit ad officia Lorem consequat esse laborum exercitation magna voluptate aute. Eiusmod dolor aliquip reprehenderit non esse elit incididunt.", "Exercitation magna incididunt laboris nostrud do dolor aute est. Ex sit do amet id cupidatat culpa dolor officia non Lorem proident commodo mollit. Aliquip in laborum officia culpa pariatur commodo est. Elit ex est qui id laborum nisi qui est. Velit reprehenderit nostrud anim ad esse do nulla magna ad. Dolore minim fugiat Lorem nisi Lorem veniam amet ea deserunt officia reprehenderit in ut incididunt."];
        $descriptionsInfo = "Max. characters : 300";
        $buttonTexts = ["", "", "view all works", ""];
        $buttonTextsInfo = "Max. characters : 20";
        $buttonLinks = ["", "", "/portfolio", ""];
        $buttonLinksInfo = "Kindly leave this to the developer";
        
        foreach($titles as $index => $title){

            $aboutcontent = new AboutContent;
            $aboutcontent->section_title = $title;
            $aboutcontent->section_title_info = $titlesInfo;
            $aboutcontent->section_description = $descriptions[$index];
            $aboutcontent->section_description_info = $descriptionsInfo;
            $aboutcontent->section_button_text = $buttonTexts[$index];
            $aboutcontent->section_button_text_info = $buttonTextsInfo;
            $aboutcontent->section_button_link = $buttonLinks[$index];
            $aboutcontent->section_button_link_info = $buttonLinksInfo;
            
            $aboutcontent->save();

        }

        
    }
}
