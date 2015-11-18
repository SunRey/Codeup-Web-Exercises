<?php

function inputHas($key) 
{
    return (isset($_REQUEST[$key])) ? true : false;
}

function inputGet($key) 
{
    return (inputHas($key)) ? $_REQUEST[$key] : false;
}

function escape($input)
{
    return htmlspecialchars(strip_tags($input));
}
?>
