<?php

namespace App\Utils;

class Uploader
{
    public function uploadImage($image)
    {
        $name   = $image->getClientOriginalName();
        $name   = time() . '_' . $name;
        $image->move('uploads', $name);
        $uploaded_image = '/uploads/' . $name;

        return $uploaded_image;
    }
}
