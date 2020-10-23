<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('section_title')->nullable();
            $table->string('section_title_info')->nullable();
            $table->text('section_description')->nullable();
            $table->string('section_description_info')->nullable();
            $table->string('section_button_text')->nullable();
            $table->string('section_button_text_info')->nullable();
            $table->string('section_button_link')->nullable();
            $table->string('section_button_link_info')->nullable();
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
        Schema::dropIfExists('contact_contents');
    }
}
