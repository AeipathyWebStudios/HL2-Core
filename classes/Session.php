<?php

class Session{

    /**
     * Get session name
     * @param $name
     */

    public static function get($name)
    {
        return $_SESSION[$name];
    }

    /**
     * Set a session up
     * @param $name
     * @param $value
     */

    public static function put($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function exists($name)
    {
        return isset($_SESSION[$name]) ? true : false;
    }

    public static function destroy($name)
    {
        if(self::exists($name)){
            unset($_SESSION[$name]);
        }
    }

    public static function flash($name, $string = '')
    {
        if(self::exists($name)){
            $session = self::get($name);
            self::destroy($name);
            return $session;
        }else{
            self::put($name, $string);
        }

    }

}