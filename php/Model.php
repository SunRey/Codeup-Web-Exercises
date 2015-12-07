<?php

class Model 
{
    protected static $table;
    
    private attributes = [];

    public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __get($name) 
    {
        return (array_key_exists($name, $this-attributes)) ? $this->attributes[$name] : NULL;
    }
}g