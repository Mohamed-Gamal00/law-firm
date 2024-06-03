<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'features',
        'feature_content',
        'video_link',
        'video_title',
        'video_content',
        'points',
        'team_work',
        'happy_clients',
        'successful_lawsuits',
        'successful_consultations',
    ];

    protected $casts = [
        'features' => 'array',
        'feature_content' => 'array',
        'points' => 'array',
    ];
}
