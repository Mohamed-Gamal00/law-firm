<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{

    protected $table = 'newsarticles';
    public $timestamps = true;
    protected $fillable = array('title', 'desc', 'content', 'image');

}
