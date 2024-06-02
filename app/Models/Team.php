<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    protected $table = 'teams';
    public $timestamps = true;
    protected $fillable = array('name', 'job_title', 'experience', 'email', 'phone', 'twitter', 'facebook', 'instagram', 'linked_in', 'personal_info', 'certifications','image');

    protected $casts =[
        'certifications' => 'array',
    ];

}
