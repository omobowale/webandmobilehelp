<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $servicesNames = ["Desktop, Web & Mobile Apps", "Digital Marketing", "Academic Research & Writing", "Market & Customer Research", "Office Process Automation"];
        $servicesShortDescription = ["Desktop, Web &amp; Mobile Apps description", "Rank your page ahead of your competitors", "Get market, business, technical & academic researc...", "IT & business training for increased productivity", " Automate your mundane repetitive task"];
        $servicesMetaTitle = ["Desktop, Web &amp; Mobile Apps meta title", "Rank your page ahead of your competitors", "Get market, business, technical & academic researc...", "IT & business training for increased productivity", " Automate your mundane repetitive task"];
        $servicesMetaDescription = ["Desktop, Web &amp; Mobile Apps meta description", "Rank your page ahead of your competitors", "Get market, business, technical & academic researc...", "IT & business training for increased productivity", " Automate your mundane repetitive task"];
        $servicesDetails = ["Desktop, Web & Mobile Apps description", "Digital Marketing description", "Academic Research & Writing description", "Market & Customer Research description", "Office Process Automation description"];
        $servicesSlugs = ["Desktop-Web-Mobile-Apps", "Digital-Marketing", "Academic-Research-Writing", "Market-Customer-Research", "Office-Process-Automation"];
        foreach($servicesNames as $index => $serviceName){
            $service = new Service;
            $service->name = $serviceName;
            $service->short_description = $servicesShortDescription[$index];
            $service->meta_title = $servicesMetaTitle[$index];
            $service->meta_description = $servicesMetaDescription[$index];
            $service->details = $servicesDetails[$index];
            $service->slug = $servicesSlugs[$index];
            $service->save();
        }
    }

}

