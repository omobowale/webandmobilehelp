<?php

use Illuminate\Database\Seeder;
use App\CommonContent;

class CommonContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ["There you go", "Terms and Condition"];
        $titlesInfo = "Max. characters : 30";
        $descriptions = ["Need an application for your own business?", "The following explains our terms and condition."];
        $descriptionsInfo = "Max. characters : Unlimited";
        $buttonTexts = ["Request a Quote", ""];
        $buttonTextsInfo = "Max. characters : 20";
        $buttonLinks = ["", ""];
        $buttonLinksInfo = "Kindly leave this to the developer";
        
        foreach($titles as $index => $title){

            $content = new CommonContent;
            $content->section_title = $title;
            $content->section_title_info = $titlesInfo;
            $content->section_description = $descriptions[$index];
            $content->section_description_info = $descriptionsInfo;
            $content->section_button_text = $buttonTexts[$index];
            $content->section_button_text_info = $buttonTextsInfo;
            $content->section_button_link = $buttonLinks[$index];
            $content->section_button_link_info = $buttonLinksInfo;
            
            $content->save();

        }

        
    }
}
