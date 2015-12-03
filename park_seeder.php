<?php
require 'parks_db_constants.php';
require 'db_connect.php';

echo $dbc->getAttribute(PDO::ATTR_CONNECTION_STATUS) . "\n";

$dbc->exec('TRUNCATE national_parks;');

$parks =[
    ['name' => 'Arches',      'parkURL' => 'https://goo.gl/hdSfzv', 'location' => 'Utah',         'date_established' => '1929-04-12', 'area_in_acres' => 76518.98, 'description' => 'THIS IS TEXT!!!!!'],
    ['name' => 'Badlands',    'parkURL' => 'https://goo.gl/2CfhSe', 'location' => 'South Dakota', 'date_established' => '1978-11-10', 'area_in_acres' => 242755.94, 'description' => 'THIS IS TEXT!!!!!'],
    ['name' => 'Crater Lake', 'parkURL' => 'https://goo.gl/M8cqbH', 'location' => 'Oregon',       'date_established' => '1902-05-22', 'area_in_acres' => 183224.05, 'description' => 'THIS IS TEXT!!!!!'],
    ['name' => 'Denali',      'parkURL' => 'https://goo.gl/c6OigG', 'location' => 'Alaska',       'date_established' => '1917-02-26', 'area_in_acres' => 4740911.72, 'description' => 'THIS IS TEXT!!!!!'],
    ['name' => 'Everglades',  'parkURL' => 'https://goo.gl/ETAUAK', 'location' => 'Florida',      'date_established' => '1934-05-30', 'area_in_acres' => 1508537.90, 'description' => 'THIS IS TEXT!!!!!'],
    ['name' => 'Glacier',     'parkURL' => 'https://goo.gl/88PgJj', 'location' => 'Montana',      'date_established' => '1910-05-11', 'area_in_acres' => 1013572.41, 'description' => 'THIS IS TEXT!!!!!'],
    ['name' => 'Hot Springs', 'parkURL' => 'https://goo.gl/KaeHP9', 'location' => 'Arkansas',     'date_established' => '1832-04-20', 'area_in_acres' => 5549.75, 'description' => 'THIS IS TEXT!!!!!'],
    ['name' => 'Isle Royale', 'parkURL' => 'https://goo.gl/8jGYR5', 'location' => 'Michigan',     'date_established' => '1940-04-03', 'area_in_acres' => 571790.11, 'description' => 'THIS IS TEXT!!!!!'],
    ['name' => 'Joshua Tree', 'parkURL' => 'https://goo.gl/66qfmx', 'location' => 'California',   'date_established' => '1994-10-31', 'area_in_acres' => 789745.47, 'description' => 'THIS IS TEXT!!!!!'],
    ['name' => 'Mesa Verde',  'parkURL' => 'https://goo.gl/0MM9aD', 'location' => 'Colorado',     'date_established' => '1906-06-29', 'area_in_acres' => 52121.93, 'description' => 'THIS IS TEXT!!!!!'] 
];

$query = 'INSERT INTO national_parks(name, parkURL, location, date_established, area_in_acres, description) VALUES(:name, :parkURL, :location, :date_established, :area_in_acres, :description)';

$stmt = $dbc->prepare($query);

foreach ($parks as $park) {
    $stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
    $stmt->bindValue(':parkURL', $park['parkURL'], PDO::PARAM_STR);
    $stmt->bindValue(':location', $park['location'], PDO::PARAM_STR);
    $stmt->bindValue(':date_established', $park['date_established'], PDO::PARAM_STR);
    $stmt->bindValue(':area_in_acres', $park['area_in_acres'], PDO::PARAM_INT);
    $stmt->bindValue(':description', $park['description'], PDO::PARAM_STR);
    $stmt->execute();
}