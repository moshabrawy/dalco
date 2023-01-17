<?php

namespace App\Traits;

use File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait FileUpload
{
    /**
     * UploudImage Function
     * Upload Image has many types
     */
    function UploudImage($img, $path)
    {
        $imageName = uniqid() . '.' . $img->getClientOriginalExtension();
        $img->move(public_path('assets/images/' . $path), $imageName);
        return $imageName;
    }
}
