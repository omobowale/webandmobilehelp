<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_name');
            $table->string('item');
            $table->text('value')->nullable();
            $table->string('info');
            // $table->text('home_one_description');
            // $table->text('home_one_button_text');
            // $table->text('home_one_image');
            // $table->text('home_two_contact_title');
            // $table->text('home_two_contact_description');
            // $table->text('home_two_vision_title');
            // $table->text('home_two_vision_description');
            // $table->text('home_two_mission_title');
            // $table->text('home_two_mission_description');
            // $table->text('home_two_culture_title');
            // $table->text('home_two_culture_description');
            // $table->text('about_one_title');
            // $table->text('about_one_introduction');
            // $table->text('about_one_description');
            // $table->text('about_two_title');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
