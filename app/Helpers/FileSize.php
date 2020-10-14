<?php

namespace App\Helpers;

class FileSize
{

    public static function bytesToHuman($bytes)
    {
        $units = ['bytes', 'kb', 'mb', 'gb', 'tb', 'pb'];

        for ($i = 0; $bytes > 1024; $i++) {
            $bytes /= 1024;
        }

        return round($bytes, 2) . $units[$i];
    }

}