<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'code', 'date', 'image'];

    public function getImageAttribute($image)
    {
        return asset('assets/images/certificates/' . $image);
    }
}
