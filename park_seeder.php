<?php
require 'parks_db_constants.php';
require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$dbc->exec('TRUNCATE national_parks;');

$parks =[
    ['name' => 'Arches',      'parkURL' => 'https://goo.gl/hdSfzv', 'location' => 'Utah',         'date_established' => '1929-04-12', 'area_in_acres' => 76518.98],
    ['name' => 'Badlands',    'parkURL' => 'https://goo.gl/2CfhSe', 'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => 242755.94],
    ['name' => 'Crater Lake', 'parkURL' => 'https://goo.gl/M8cqbH', 'location' => 'Oregon',       'date_established' => '1902-05-22', 'area_in_acres' => 183224.05],
    ['name' => 'Denali',      'parkURL' => 'https://goo.gl/c6OigG', 'location' => 'Alaska',       'date_established' => '1917-02-26', 'area_in_acres' => 4740911.72],
    ['name' => 'Everglades',  'parkURL' => 'https://goo.gl/ETAUAK', 'location' => 'Florida',      'date_established' => '1934-05-30', 'area_in_acres' => 1508537.90],
    ['name' => 'Glacier',     'parkURL' => 'https://goo.gl/88PgJj', 'location' => 'Montana',      'date_established' => '1910-05-11', 'area_in_acres' => 1013572.41],
    ['name' => 'Hot Springs', 'parkURL' => 'https://goo.gl/KaeHP9', 'location' => 'Arkansas',     'date_established' => '1832-04-20', 'area_in_acres' => 5549.75],
    ['name' => 'Isle Royale', 'parkURL' => 'https://goo.gl/8jGYR5', 'location' => 'Michigan',     'date_established' => '1940-04-03', 'area_in_acres' => 571790.11],
    ['name' => 'Joshua Tree', 'parkURL' => 'https://goo.gl/66qfmx', 'location' => 'California',   'date_established' => '1994-10-31', 'area_in_acres' => 789745.47],
    ['name' => 'Mesa Verde',  'parkURL' => 'https://goo.gl/0MM9aD', 'location' => 'Colorado',     'date_established' => '1906-06-29', 'area_in_acres' => 52121.93] 
];

foreach ($parks as $park) {
    $query = "INSERT INTO national_parks(name, parkURL, location, date_established, area_in_acres) VALUES('{$park['name']}', '{$park['parkURL']}', '{$park['location']}', '{$park['date_established']}', '{$park['area_in_acres']}');";
    $dbc->exec($query);
}