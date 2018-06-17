<?php
/**
 *
 */

namespace App\Helpers;


use Illuminate\Http\UploadedFile;

class FileHelper
{
    /**
     * @param UploadedFile $file
     * @return string
     */
    public static function upload(UploadedFile $file)
    {
        $fileName = $file->hashName();
        $directory = substr($fileName, 0, 3) . '/'
            .substr($fileName, 0, 2);

        return '/storage/' . $file->store('posts/' . $directory, 'public');
    }
}