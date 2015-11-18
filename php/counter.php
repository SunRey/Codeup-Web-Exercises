<?php
// function getUp () 
// {
//     $counter++;
//     return "counter.php?up=1&counter={$counter}";
// }
// function getDown () 
// {
//     $counter--;
//     return "counter.php?down=1&counter={$counter}";
// }

function pageController () 
{
    // $urlUp = getUp($counter);
    // $urlDown = getDown();
    $counter = isset($_GET['counter'])? $_GET['counter'] : 0;
    $up = $counter + 1;
    $down = $counter - 1;

    return array (
        'counter' => $counter,
        'up' => $up,
        'down' => $down
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
        <!-- // <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script> -->
        <!-- <link rel="stylesheet" href="css/main.css"> -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
        <!-- // <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> -->
    </head>
    <body>
        <?php var_dump($up); var_dump($down); ?>
        <h2>Counter: <span><?= $counter ?></span></h2>
        <a href="counter.php?counter=<?= $up ?>">UP</a>
        <a href="counter.php?counter=<?= $down ?>">DOWN</a>

        <!-- // <script src="js/main.js"></script> -->
    </body>
</html>