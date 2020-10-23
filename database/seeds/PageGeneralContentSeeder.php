<?php

use Illuminate\Database\Seeder;
use App\PageGeneralContent;

class PageGeneralContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pageNames = ["home", "about", "services", "portfolio", "contact", "blog"];
        $pageIntroductions = ["We build web and mobile products that drive business value and improve lives.", "We’re a team of passionate designers, developers and strategists who create web and mobile experiences that improve lives.", "Amet et sint sunt tempor duis.", "Ullamco eiusmod cupidatat amet tempor sunt excepteur.", "Dolore proident deserunt id amet ut do velit non.", "Amet et sint sunt tempor duis.", "Welcome to our blog section"];
        $pageIntroductionsInfo = "Max. Characters : 250";
        $pageButtonTexts = ["Find out how", "Learn more", "Check them out", "Our works", "Get in touch", "Continue"];
        $pageButtonTextsInfo = "Max. Characters : 20";
        $pageButtonLinks = ["home-content", "about-content", "services-content", "portfolio-content", "contact-content", "blog-content"];
        $pageButtonLinksInfo = "Kindly leave this to the developer";
        $pageBackgroundImageUrls = ["", "", "", "", "", ""];
        $pageMetaTitles = ["Home | WebAndMobileHelp", "About | WebAndMobileHelp", "Services | WebAndMobileHelp", "Portfolio | WebAndMobileHelp", "Contact | WebAndMobileHelp", "Blog | WebAndMobileHelp"];
        $pageMetaDescriptions = ["Welcome to WebAndMobileHelp", "About WebAndMobileHelp", "Our Services at WebAndMobileHelp", "WebAndMobileHelp Portfolio", "Contact us at WebAndMobileHelp", "Our Blog at WebAndMobileHelp"];

        foreach($pageNames as $index => $pageName){
            $pagegeneralcontent = new PageGeneralContent;
            
            $pagegeneralcontent->name = $pageName;
            $pagegeneralcontent->introduction = $pageIntroductions[$index];
            $pagegeneralcontent->introduction_info = $pageIntroductionsInfo;
            $pagegeneralcontent->button_text = $pageButtonTexts[$index];
            $pagegeneralcontent->button_text_info = $pageButtonTextsInfo;
            $pagegeneralcontent->button_link = $pageButtonLinks[$index];
            $pagegeneralcontent->button_link_info = $pageButtonLinksInfo;
            $pagegeneralcontent->background_image_url = $pageBackgroundImageUrls[$index];
            $pagegeneralcontent->meta_title = $pageMetaTitles[$index];
            $pagegeneralcontent->meta_description = $pageMetaDescriptions[$index];

            $pagegeneralcontent->save();
            
        }
    }
}
