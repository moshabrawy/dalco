<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title_en',
        'title_ar',
        'type_en',
        'type_ar',
        'description_en',
        'description_ar',
    ];

    public function getImageAttribute($image)
    {
        return asset('assets/images/projects/' . $image);
    }

    public function images()
    {
        return $this->hasMany(ProjectImages::class);
    }
}
