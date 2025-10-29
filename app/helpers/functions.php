<?php

/**
 * DUMP AND DIE
 * 
 * @param mixed $value
 * 
 * @return [type]
 */
function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';

    die();
}

/**
 * Returns the complete path 
 * 
 * @param string $path
 * 
 * @return string
 */
function base_path($path)
{
    return BASE_PATH . $path;
}

/**
 * Loads a view with the specified attributes
 * 
 * @param string $path
 * @param array $attributes
 * 
 * @return void
 */
function view($path, $attributes = [])
{
    extract($attributes);
    require base_path('app/views/') . $path;
}

/**
 * Loads the coresponding error page (404, 500, etc)
 * 
 * @param int $code
 * 
 * @return never
 */
function abort($code)
{
    http_response_code($code);
    require base_path("app/views/$code.php");
    exit();
}

/**
 * Redirects the user to other page
 * 
 * @param string $path
 * 
 * @return never
 */
function redirect($path)
{
    header("location: $path");
    exit();
}

function img_verify($img)
{
    if (!empty($img) && $img['error'] === UPLOAD_ERR_OK) {

        $imageName = uniqid() . '_' . basename($img['name']);
        $uploadDir = 'uploads/products/';
        $uploadPath = base_path('public/' . $uploadDir . $imageName);

        move_uploaded_file($img['tmp_name'], $uploadPath);

        return $uploadDir . $imageName;
    }
}