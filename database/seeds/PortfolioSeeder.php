<?php

use Illuminate\Database\Seeder;
use App\Portfolio;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfolioNames = ["Portfolio One", "Portfolio Two", "Portfolio Three", "Portfolio Four", "Portfolio Five", "Portfolio Six"];
        $portfolioShortDescriptions = ["Portfolio One short description", "Portfolio Two short description", "Portfolio Three short description", "Portfolio Four short description", "Portfolio Five short description", "Portfolio Six short description"];
        $portfolioCategories = ["Web Apps", "Mobile Apps", "Digital Marketing", "Digital Marketing", "Mobile Apps", "Web Apps"];
        $portfolioPortfolioLinks = ["https://google.com", "https://google.com", "https://google.com", "https://google.com", "https://google.com", "https://google.com"];
        foreach($portfolioNames as $index => $portfolioName){
            $portfolio = new Portfolio;
            $portfolio->name = $portfolioName;
            $portfolio->short_description = $portfolioShortDescriptions[$index];
            $portfolio->category = $portfolioCategories[$index];
            $portfolio->portfolio_link = $portfolioPortfolioLinks[$index];
            $portfolio->save();
        }
    }

}

