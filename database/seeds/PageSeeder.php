<?php

use Illuminate\Database\Seeder;
use App\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pageNames = ["Home", "About", "Services", "Contact"];
        $pageTitle = ["Home", "About Us", "Our Services", "Contact Us"];
        $pageDescription = ["Automation | Software | Research | Training | Overseas Study", "Welcome to our world", "Check out our services", "We love to hear from you"];
        $pageMetaTitle = ["This is the home page meta_title", "This is the about page meta_title", "This is the services page meta_title", "This is the contact page"];
        $pageMetaDescription = ["This is the home page meta_description", "This is the about page meta_description", "This is the services page meta_description", "This is the contact page meta_description"];
        
        foreach($pageNames as $index => $pageName){
            $page = new Page;
            $page->name = $pageName;
            $page->title = $pageTitle[$index];
            $page->description = $pageDescription[$index];
            $page->meta_title = $pageMetaTitle[$index];
            $page->meta_description = $pageMetaDescription[$index];
            $page->save();
        }
    }
}
