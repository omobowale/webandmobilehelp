<?php

use Illuminate\Database\Seeder;
use App\HomeContent;

class HomeContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $titles = ["about us", "our services", "our portfolio", "our team"];
        $classes = ["home-content-about-us", "home-content-our-services", "home-content-our-portfolio", "home-content-our-team"];
        $titlesInfo = "Max. characters : 15";
        $descriptions = ["Eiusmod dolore ad reprehenderit culpa eiusmod sint magna dolore amet qui pariatur exercitation amet. Ipsum fugiat sit aliqua ipsum. Magna aute aliqua ex eiusmod ex id laboris. Sit aute sit aute id consequat incididunt nostrud aliquip.", "Tempor ut dolore voluptate amet Lorem sunt laborum consectetur laboris exercitation ad laboris. Et magna veniam exercitation commodo laboris eiusmod qui adipisicing deserunt culpa sunt Lorem sint. Sit nulla duis irure Lorem aliquip qui cillum. Eiusmod adipisicing nisi ut pariatur ad Lorem ex. In cupidatat ad ut officia culpa Lorem elit consequat magna ad est pariatur in magna.", "Ex do eu cupidatat id sint. Cillum incididunt ut dolor duis. Magna occaecat enim et consequat nisi. Sit ad officia Lorem consequat esse laborum exercitation magna voluptate aute. Eiusmod dolor aliquip reprehenderit non esse elit incididunt.", "Exercitation magna incididunt laboris nostrud do dolor aute est. Ex sit do amet id cupidatat culpa dolor officia non Lorem proident commodo mollit. Aliquip in laborum officia culpa pariatur commodo est. Elit ex est qui id laborum nisi qui est. Velit reprehenderit nostrud anim ad esse do nulla magna ad. Dolore minim fugiat Lorem nisi Lorem veniam amet ea deserunt officia reprehenderit in ut incididunt."];
        $descriptionsInfo = "Max. characters : 300";
        $textPositions = ["left", "right", "left", "right"];
        $textPositionsInfo = "Select the position of the section description";
        $buttonTexts = ["learn more", "view all of our services", "view our portfolio", "view our team members"];
        $buttonTextsInfo = "Max. characters : 20";
        $buttonLinks = ["/about", "/services", "/portfolio", "/about#team"];
        $buttonLinksInfo = "Kindly leave this to the developer";
        $imgurls = ["", "", "", ""];
        $imgurlsInfo = "Max. size : 2MB ";
        $backgroundColors = ["", "", "", ""];
        $backgroundColorsInfo = "Color should be in hex format (#xxxxx)";

        foreach($titles as $index => $title){

            $homecontent = new HomeContent;
            $homecontent->section_title = $title;
            $homecontent->section_title_info = $titlesInfo;
            $homecontent->section_class = $classes[$index];
            $homecontent->section_description = $descriptions[$index];
            $homecontent->section_description_info = $descriptionsInfo;
            $homecontent->section_text_position = $textPositions[$index];
            $homecontent->section_text_position_info = $textPositionsInfo;
            $homecontent->section_button_text = $buttonTexts[$index];
            $homecontent->section_button_text_info = $buttonTextsInfo;
            $homecontent->section_button_link = $buttonLinks[$index];
            $homecontent->section_button_link_info = $buttonLinksInfo;
            $homecontent->section_image_url = $imgurls[$index];
            $homecontent->section_image_url_info = $imgurlsInfo;
            $homecontent->section_background_color = $backgroundColors[$index];
            $homecontent->section_background_color_info = $backgroundColorsInfo;

            $homecontent->save();

        }


    }
}
