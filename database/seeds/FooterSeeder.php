<?php

use Illuminate\Database\Seeder;
use App\Footer;

class FooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $footerWebName = "WebAndMobileHelp";
        $footerWebDescription = "Culpa excepteur sit ea sit et dolor. Commodo excepteur qui amet esse ipsum commodo amet in aliqua. In adipisicing laborum do adipisicing commodo Lorem consequat est aute laboris eu do labore consequat. Nostrud consequat exercitation occaecat nostrud minim eiusmod do id laboris ex.";
        $footerCopyrightStatement = "Copyrights 2020 WebAndMobileHelp";
        
            $footer = new Footer;
            $footer->webname = $footerWebName;
            $footer->webdescription = $footerWebDescription;
            $footer->copyrightstatement = $footerCopyrightStatement;
            $footer->save();
        
    }
}
