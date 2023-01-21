<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $table = 'about-us';

    protected $fillable = [
        'title',
        'desc',
        'image',
        'video',
        'address',
        'email',
        'phone',
        'projects_info',
        'social'
    ];

    protected $casts = [
        'projects_info' => 'array',
        'social' => 'array',
    ];

    public function getImageAttribute($image)
    {
        return asset('assets/images/certificates/' . $image);
    }
}
