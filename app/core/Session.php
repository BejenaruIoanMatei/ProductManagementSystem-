<?php

namespace App\Core;

class Session
{
    /**
     * @param string $key
     * @param mixed $value
     * 
     * @return void
     */
    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key 
     * @param mixed $default, key or null (by default)
     * 
     * @return mixed string, key or null
     */
    public static function get($key, $default = null)
    {
        if (isset($_SESSION['_flash'][$key])){
            return $_SESSION['_flash'][$key];
            
        }
        return $_SESSION[$key] ?? $default;
    }

    /**
     * @param string $key
     * 
     * @return bool yes, if there is a key
     */
    public static function has($key)
    {
        return (bool) static::get($key);
    }

    /**
     * @param string $key
     * @param mixed $value
     * 
     * @return void
     */
    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }

    /**
     * @return void
     */
    public static function unflash()
    {
        unset($_SESSION['_flash']);
    }

    /**
     * @return void
     */
    public static function flush()
    {
        $_SESSION = [];
    }

    /**
     * Destroy the session
     * 
     * @return void
     */
    public static function destroy()
    {
        static::flush();
        session_destroy();
    
        $params = session_get_cookie_params();
    
        setcookie(
            name: 'PHPSESSID',
            value: '',
            expires_or_options: time() - 3600,
            path: $params['path'],
            domain: $params['domain'],
            secure: $params['secure'],
            httponly: $params['httponly']
        );
    }

}