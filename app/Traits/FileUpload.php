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

    function UploudPdf($pdf, $path)
    {
        $pdfName = $pdf->getClientOriginalName();
        $file_path = public_path() . '/assets/pdf/' . $pdfName;
        if (file_exists($file_path)) {
            File::delete($file_path);
        }
        $pdf->move(public_path('assets/pdf/' . $path), $pdfName);
        return $pdfName;
    }

    /**
     * UploudImages Function
     * Upload Image has many types
     */
    function UploudFiles($files, $path)
    {
        $all_files = [];
        if ($files) {
            foreach ($files as $file) {
                $imageName = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/' . $path), $imageName);
                array_push($all_files, $imageName);
            }
        }
        return $all_files;
    }
}
