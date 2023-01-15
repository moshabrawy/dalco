<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name_en',
        'name_ar',
        'title_en',
        'title_ar',
        'social_links',
    ];

    protected $casts = [
        'social_links' => 'array',
    ];
}
