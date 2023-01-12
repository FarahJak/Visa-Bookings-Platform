<?php

namespace App\Http\Traits;

use Intervention\Image\ImageManagerStatic as Image;

trait SaveImageTrait
{
    public function saveImage($photo, $folder, $width, $height)
    {
        // Saving The Image
        $imageExtension = $photo->getClientOriginalExtension();
        $image_name = time() . '.' . $imageExtension;
        $image_name_DataBase = $folder . '/' . time() . '.' . $imageExtension;
        $path = $folder . '/' . $image_name;
        Image::make($photo)->resize(
            $width,
            $height,
            function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            }
        )->save($path);
        return $image_name_DataBase;
    }
}
