<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOpinion extends Model
{
    use HasFactory;
    protected $fillable = array('name', 'content', 'image', 'status');

}
