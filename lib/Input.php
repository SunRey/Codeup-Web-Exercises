<?php

class Input
{
    public static function notEmpty($key) 
    {
        if (isset($_REQUEST[$key]) && $_REQUEST[$key] != '') {
            return true;
        }
    }
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        // TODO: Fill in this function
        return (isset($_REQUEST[$key]));
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = NULL)
    {
        return (self::has($key)) ? $_REQUEST[$key] : $default;
    }

    /**
     *sanitize string and return it
     * @param string to be sanitized
     * @return sanitized string (no special chars or tags)
     */
    public static function escape($string)
    {
        return htmlspecialchars(strip_tags($string));
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
?>
