<?php
namespace App\Helpers;
use Cart;

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

    public static function customTotal()
    {
        $carts = Cart::content();
        $total = 0;

        foreach ($carts as $cart) {
            $total += $cart->price * $cart->qty;
        }

        return $total;
    }
}
