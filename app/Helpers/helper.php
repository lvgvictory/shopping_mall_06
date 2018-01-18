<?php
namespace App\Helpers;
class Helper
{
    public static function upload($file, $path)
    {
        try {
            if (!$file) {
                $filename = config('custom.defaultAvatar');
            } else {
                $filename = $file->getClientOriginalName();
                $file->move($path, $filename);
            }
            return $filename;
        } catch (Exception $e) {
            Log::error($e);
            return false;
        }
    }
}
