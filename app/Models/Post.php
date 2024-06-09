<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'desc', 'content', 'image','category_id');

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
