<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'client_name_en',
        'client_name_ar',
    ];

    public function getImageAttribute($image)
    {
        return asset('assets/images/clients/' . $image);
    }
}
