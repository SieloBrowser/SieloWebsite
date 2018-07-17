<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07/07/2018
 * Time: 17:52
 */

namespace Core\Cookie;

use Core\Config\Config;

class Cookie
{
    public static function addCookie($name, $value, $path, $expiration = null)
    {
        if(!self::cookieExists($name))
        {
            setcookie($name, $value, time()+$expiration || Config::getInstance()->getCookieExpirationTime(), $path);
        }
    }

    public static function deleteCookie($name)
    {
        unset($_COOKIE[$name]);
    }

    public static function getCookie($name)
    {
        if(self::cookieExists($name))
            return $_COOKIE[$name];
    }

    public static function cookieExists($name)
    {
        if(key_exists($name, $_COOKIE))
            return true;
        return false;
    }
}