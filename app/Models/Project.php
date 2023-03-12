<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'date',
        'price',
        'title_en',
        'title_ar',
        'owner_en',
        'owner_ar',
        'status_en',
        'status_ar',
        'type_en',
        'type_ar',
        'duration_en',
        'duration_ar',
        'description_en',
        'description_ar',
        'gallery',
    ];

    protected $casts = ['gallery' => 'array'];

    public function getImageAttribute($image)
    {
        return asset('assets/images/projects/' . $image);
    }
}
