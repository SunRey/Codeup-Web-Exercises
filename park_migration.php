<?php 
require 'parks_db_constants.php';
require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$dbc->exec('DROP TABLE IF EXISTS national_parks;');

$createTable = 'CREATE TABLE national_parks (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(75) NOT NULL,
    parkURL VARCHAR(200) NOT NULL,
    location VARCHAR(100) NOT NULL, 
    date_established DATE NOT NULL,
    area_in_acres DOUBLE(10, 2),
    PRIMARY KEY (id)
);';

$dbc->exec($createTable);


?>