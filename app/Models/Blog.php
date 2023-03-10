<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title_en',
        'title_ar',
        'description_en',
        'description_ar',
    ];

    public function getImageAttribute($image)
    {
        return asset('assets/images/blogs/' . $image);
    }
}
