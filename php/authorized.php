<?php
    require_once('functions.php');
    session_start();
    if (! isset($_SESSION['LOGGED_IN_USER']) || $_SESSION['LOGGED_IN_USER'] === false) {
        header("Location: login.php");
        die();
    }
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
        <h2><a href="login.php">AUTHORIZED!!</a></h2>
        <a href='logout.php' class="btn btn-danger">LogOut</a>
        <!-- // <script src="js/main.js"></script> -->
    </body>
</html>