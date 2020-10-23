<?php

use Illuminate\Database\Seeder;
use App\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            
            $contentPages = ["Home", "Home", "Home", "Home", "Home", "Home", "Home", "Home", "Home", "Home", "Home", "Home", "About", "About", "About", "About", "About"];
            $contentItems = ["home_one_title", "home_one_description", "home_one_button_text", "home_one_image", "home_two_contact_title", "home_two_contact_description", "home_two_vision_title", "home_two_vision_description", "home_two_mission_title", "home_two_mission_description", "home_two_culture_title", "home_two_culture_description", "about_one_title", "about_one_introduction", "about_one_description", "about_one_outro", "about_two_title"];
            $contentValues = ["Who we are", "BrilloConnetz focuses on providing quality but affordable automation, software, research & training...", "Read More", "/storage/images/background-image3.jpg", "Contact Us", "Do you have a fresh idea you will love to create a software for? Or perhaps you have a business or IT training need or to automate or improve a work process or a boring repetitive task? Or maybe it’s a research and writing task!! or an overseas study admission assistance? We are here to help", "Vision", "To be a world class software development, automation, training, research & overseas study assistance provider by the year 2025.", "Mission", "To build world class web and mobile that provide solution to real world problems.;; To help offices automate boring and especially repetitive task or workflow processes.;; To train children & adults IT software usage and programming.;; To conduct affordable market, business, technical & academic research and overseas study application assistance.", "Culture", "We have a culture that encourages teamwork, innovation and learning.;; We are open to new ideas and feedback; we use them to change the way we do things.", "About Company", "BrilloConnetz is focused on providing quality but affordable research, training, software and office automation to improve workplace productivity and workflow. We also provide overseas study application assistance.", "We provide information and communications technology training.;; We conduct market & customer research.;; We engage in research works; provide editing & proofreading services.;; We build web and mobile applications.;; We build Excel VBA models etc.", "We have a diverse team with distinguished professionals that are skilled in various forms of research, statistical, qualitative, quantitative, training, data analysis, technological application, and design", "Who we really are"];
            $contentInfo = ["Max. number of characters : 20", "Max. number of characters : 150", "Max. number of characters : 20", "Max. size: 2MB", "Max. number of characters : 20", "Max. number of characters : 350", "Max. number of characters : 20", "Max. number of characters : 350. You may separate each item by a double semicolon (;;)", "Max. number of characters : 20", "Max. number of characters : 350. You may separate each item by a double semicolon (;;)", "Max. number of characters : 20", "Max. number of characters : 350. You may separate each item by a double semicolon (;;)", "Max. number of characters : 20", "Max. number of characters : 250", "Max. number of characters : 500", "Max. number of characters : 150", "Max. number of characters : 20"];


            foreach($contentItems as $index => $contentItem){
                $content = new Content;
                $content->page_name = $contentPages[$index];
                $content->item = $contentItem;
                $content->value = $contentValues[$index];
                $content->info = $contentInfo[$index];
                $content->save();
            }

            // $content->home_one_title = "Who we are";
            // $content->home_one_description = "BrilloConnetz focuses on providing quality but affordable automation, software, research & training...";
            // $content->home_one_button_text = "Read More";
            // $content->home_one_image =  "/storage/images/background-image3.jpg";
            // $content->home_two_contact_title = "Contact Us";
            // $content->home_two_contact_description = "Do you have a fresh idea you will love to create a software for? Or perhaps you have a business or IT training need or to automate or improve a work process or a boring repetitive task? Or maybe it’s a research and writing task!! or an overseas study admission assistance? We are here to help";
            // $content->home_two_vision_title = "Vision";
            // $content->home_two_vision_description = "To be a world class software development, automation, training, research & overseas study assistance provider by the year 2025.";
            // $content->home_two_mission_title = "Mission";
            // $content->home_two_mission_description = "To build world class web and mobile that provide solution to real world problems. To help offices automate boring and especially repetitive task or workflow processes. To train children & adults IT software usage and programming. To conduct affordable market, business, technical & academic research and overseas study application assistance.";
            // $content->home_two_culture_title = "Culture";
            // $content->home_two_culture_description = "We have a culture that encourages teamwork, innovation and learning. We are open to new ideas and feedback; we use them to change the way we do things.";
            // $content->about_one_title = "About Company";
            // $content->about_one_introduction = "BrilloConnetz is focused on providing quality but affordable research, training, software and office automation to improve workplace productivity and workflow. We also provide overseas study application assistance.";
            // $content->about_one_description = "We provide information and communications technology training. We conduct market & customer research. We engage in research works; provide editing & proofreading services. We build web and mobile applications. We build Excel VBA models etc. We have a diverse team with distinguished professionals that are skilled in various forms of research, statistical, qualitative, quantitative, training, data analysis, technological application, and design";
            // $content->about_two_title = "Who we really are";


    }
}
