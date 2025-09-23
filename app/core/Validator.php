<?php

namespace App\Core;

class Validator 
{
    public static function string($value, $min = 10, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min and strlen($value) < $max;
    }

    public static function number($value, $min = 1, $max = INF)
    {
        if (! is_numeric($value))
        {
            return false;
        }
        return $value >= $min and $value < $max;
    }

    public static function image($file, $maxSize = 5000000) 
    {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) return false;

        $validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $fileType = mime_content_type($file['tmp_name']);

        return in_array($fileType, $validTypes) && $file['size'] <= $maxSize;
    }

    public static function date($value, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $value);
        return $d and $d->format($format) === $value;
    }

}