<?php

use Illuminate\Database\Seeder;
use App\BlogContent;

class BlogContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ["Welcome to our blog section"];
        $titlesInfo = "Max. characters : 30";
        $descriptions = [""];
        $descriptionsInfo = "Max. characters : 300";
        $buttonTexts = ["Proceed"];
        $buttonTextsInfo = "Max. characters : 20";
        $buttonLinks = ["blog-content"];
        $buttonLinksInfo = "Kindly leave this to the developer";
        
        foreach($titles as $index => $title){

            $content = new BlogContent;
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
