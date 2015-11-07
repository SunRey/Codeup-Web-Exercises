<?php

$names = ['Tina', 'Dana', 'Mike', 'Amy', 'Adam'];

$compare = ['Tina', 'Dean', 'Mel', 'Amy', 'Michael'];

function searchArray ($name, $array) {
    if (array_search($name, $array) !== false) {
        return "TRUE\n";
    } else {
        return "FALSE\n";
    }
}

function compareArray($arr1, $arr2) {
    $i = 0;
    $match = 0;
    foreach ($arr1 as $name) {
        if(array_search($name, $arr2) !== false) {
            $match++;
        }
        $i++;
    }
    return $match;
}

echo "\t" . searchArray('Tina', $names);
echo "\t" . searchArray('Bob', $names);
echo '--__-_-_--  --__-_-__-- ' . PHP_EOL;
echo "\t   " . compareArray($names, $compare) . PHP_EOL;