<?php

namespace App/Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model 
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'content', 'image');

    public function category()
    {
        return $this->belongsTo('Category');
    }

}