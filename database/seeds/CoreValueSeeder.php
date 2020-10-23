<?php

use Illuminate\Database\Seeder;
use App\CoreValue;

class CoreValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $labels = ["Consectetur aute anim", "Non ullamco magna consequat", "Sunt proident ad id eiusmod", "Nisi laborum tempor proident"];
        $values = ["Sit ullamco ex anim cillum commodo ullamco mollit amet dolor. Excepteur ea nisi minim officia cupidatat incididunt eiusmod quis. Laboris qui nostrud consectetur nulla Lorem cillum laborum adipisicing sit laboris reprehenderit. Dolore tempor et exercitation.", "Esse irure elit magna adipisicing. Ea elit laboris dolor ad elit. Occaecat aute veniam veniam dolore aliquip esse nisi in eu sit commodo consequat excepteur. Et consectetur pariatur in magna cupidatat enim in fugiat nostrud.", "Ullamco exercitation adipisicing non officia nostrud. Eu officia laborum sit sunt consequat fugiat irure. Mollit culpa veniam nostrud consequat do occaecat id magna id eiusmod minim deserunt non.", "Sint nostrud enim commodo velit incididunt ad. Id reprehenderit mollit amet sunt aliquip aliquip nostrud. Ullamco laboris nulla do laboris."];

        foreach($labels as $index => $label){
            $corevalue = new CoreValue;
            $corevalue->label = $label;
            $corevalue->value = $values[$index];
            $corevalue->save();
        }
        
    }
}
