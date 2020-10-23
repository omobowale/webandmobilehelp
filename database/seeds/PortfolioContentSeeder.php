<?php

use Illuminate\Database\Seeder;
use App\PortfolioContent;

class PortfolioContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ["Check these out"];
        $titlesInfo = "Max. characters : 30";
        $descriptions = ["Quis do do officia excepteur dolor dolore commodo dolore excepteur cupidatat commodo aliquip."];
        $descriptionsInfo = "Max. characters : 300";
        $buttonTexts = [""];
        $buttonTextsInfo = "Max. characters : 20";
        $buttonLinks = [""];
        $buttonLinksInfo = "Kindly leave this to the developer";
        
        foreach($titles as $index => $title){

            $content = new PortfolioContent;
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
