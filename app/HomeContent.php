<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    protected $fillable = ['section_title', 'section_title_info', 'section_description', 'section_description_info', 'section_text_position', 'section_text_position_info', 'section_button_text', 'section_button_text_info', 'section_button_link', 'section_button_link_info', 'section_image_url', 'section_image_url_info', 'section_background_color', 'section_background_color_info'];
}
