<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07/07/2018
 * Time: 18:01
 */

namespace Core\Session;

class Session
{

    public static function connect()
    {
        if(self::sessionActive())
        {
            $_SESSION['isConnected'] = true;
        }
    }

    public static function disconnect()
    {
        if(self::isConnected())
            session_destroy();
    }

    public static function setParam($name, $value)
    {
        if(self::sessionActive())
        {
            $_SESSION[$name] = $value;
        }
    }

    public static function deleteParam($name)
    {
        if(self::isConnected())
        {
            if(self::paramExists($name))
            {
                unset($_SESSION[$name]);
            }
        }
    }

    public static function getParam($name)
    {
        if(self::isConnected())
        {
            if(self::paramExists($name))
                return $_SESSION[$name];
        }
    }

    public static function sessionActive()
    {
        return session_status() === PHP_SESSION_ACTIVE;
    }

    public static function isConnected()
    {
        if(self::sessionActive())
            return self::paramExists('isConnected');
    }

    public static function paramExists($name)
    {
        if(key_exists($name, $_SESSION))
            return true;
        return false;
    }

}