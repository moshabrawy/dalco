<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'client_name_en',
        'client_name_ar',
        'client_title_en',
        'client_title_ar',
        'description_en',
        'description_ar',
    ];

    public function getImageAttribute($image)
    {
        return asset('assets/images/testimonials/' . $image);
    }
}
