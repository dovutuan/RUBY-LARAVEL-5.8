<?php
if (!function_exists('upload_image')) {
    function uploadImage($path, $file)
    {
        $name = now()->format('HisumdY') . str_random(TEN) . '.' . $file->extension();
        $file->move(public_path() . '/files/' . $path . '/', $name);
        return $name;
    }
}

if (!function_exists('file_url')) {
    function fileUrl($path, $image)
    {
        return '/files/' . $path . '/' . $image;
    }
}
