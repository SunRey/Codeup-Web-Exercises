<?php
require 'db_constant_test.php';

$dbc = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . '', '' . DB_USER .'', '' . DB_PASSWORD .'');

$dbc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>