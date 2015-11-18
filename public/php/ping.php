<?php
require_once 'functions.php';
require_once '../lib/Input.php';
session_start();

function youGotServed ($served) 
{
    $volly = "You just got served";
    $serve = "Its your turn to serve";
    return (($served) ? $volly : $serve);
}

function pageController () 
{
    $hit = Input::get('hit');
    $miss = Input::get('miss');
    $served = Input::get('served');
    $message = youGotServed($served);
    $counter = '';

    return array(
        'message' => $message,
    );

}
extract(pageController());
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="css/main.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>

        <h3><?= $message ?></h3>
        <a href="pong.php?hit=true&served=true">HIT</a>
        <a href="pong.php?miss=true">MISS</a>

        <!-- // <script src="js/main.js"></script> -->
    </body>
</html>