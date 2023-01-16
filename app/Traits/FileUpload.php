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
        $extension = \File::extension($img);
        $imageName = uniqid() . '.' . $extension;
        \File::put(public_path() . '/assets/images/' . $path . '/' . $imageName, $img);
        return $imageName;
    }
}
