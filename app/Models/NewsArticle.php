<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{

    protected $table = 'NewsArticles';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image');

}
