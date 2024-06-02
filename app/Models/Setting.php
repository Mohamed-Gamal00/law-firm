<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = array('logo', 'phone', 'email', 'fax', 'fb_link', 'whatsapp', 'tw_link', 'insta_link', 'linkdin_link', 'footer_content_right', 'footer_content_left', 'booking_title', 'media_center_title', 'media_center_content', 'media_center_video_link');

}
