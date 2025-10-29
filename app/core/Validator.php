<?php

namespace App\Core;

class Validator 
{
    /**
     * Checks if a given string has a limit of characters, no less than min or greater than max
     * 
     * @param string $value a string for product: name, description
     * @param int $min, by default 1
     * @param int $max, by default INF
     * 
     * @return bool 
     */
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min and strlen($value) < $max;
    }

    /**
     * Checks if a given number is between min and max
     * 
     * @param number $value
     * @param int $min, by default 1
     * @param int $max, by default INF
     * 
     * @return bool
     */
    public static function number($value, $min = 1, $max = INF)
    {
        if (! is_numeric($value))
        {
            return false;
        }
        return $value >= $min and $value < $max;
    }

    /**
     * Checks - if the image was uploaded correctly,
     *        - if the image has a valid type [jpeg, jpg, png], 
     *        - if the size is less than 5MB 
     * 
     * @param array $file $_FILES['image']
     * @param int $maxSize image size, by default 5MB
     * 
     * @return [type]
     */
    public static function image($file, $maxSize = 5000000) 
    {
        if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) return false;

        $validTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $fileType = mime_content_type($file['tmp_name']);

        return in_array($fileType, $validTypes) && $file['size'] <= $maxSize;
    }

    /**
     * Checks if a given date is correct
     * 
     * @param string $value $_POST['availability_date'], $_POST['created_at]
     * @param string $format
     * 
     * @return bool
     */
    public static function date($value, $format = 'Y-m-d')
    {
        $d = \DateTime::createFromFormat($format, $value);
        return $d and $d->format($format) === $value;
    }

    /**
     * Checks if a given email is valid (has a correct structure, example@gmail.com)
     * 
     * @param string $value given emaio
     * 
     * @return mixed
     */
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

}