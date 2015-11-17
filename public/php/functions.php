<?php

function inputHas($key) 
{
    return (isset($key)) ? true : false;
}

function inputGet($key) 
{
    return (inputHas($key)) ? $key : false;
}

function escape($input)
{
    return htmlspecialchars(strip_tags($input));
}
?>
