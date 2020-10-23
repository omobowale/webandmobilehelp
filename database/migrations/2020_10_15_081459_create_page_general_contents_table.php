<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageGeneralContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_general_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('introduction');
            $table->string('introduction_info')->nullable();
            $table->string('button_text');
            $table->string('button_text_info')->nullable();
            $table->string('button_link');
            $table->string('button_link_info')->nullable();
            $table->string('background_image_url')->nullable();
            $table->string('meta_title');
            $table->text('meta_description');
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
        Schema::dropIfExists('page_general_contents');
    }
}
