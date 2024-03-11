<?php

namespace App\Helpers;

class Imagehelper
{
    public static function uploadImage($image, $subdirectory)
    {
        if ($image) {
            $imageName = '' . uniqid() . '.webp';
            $destination = public_path('uploads/' . $subdirectory);
            $image->move($destination, $imageName);
            return $subdirectory . $imageName;
        } else {
            return null;
        }
    }

}
