<?php

use Illuminate\Database\Seeder;
use App\Logo;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $logo = new Logo;
        $logo->id = 1;
        $logo->name = "default logo";
        $logo->url = "/storage/logo/webandmobilehelp-logo.png";
        $logo->alt = "WebandMobileHelp Logo";
        $logo->current = "1";
        $logo->save();
    }
}
