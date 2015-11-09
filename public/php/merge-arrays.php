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

function compareArray ($arr1, $arr2) {
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

function combine_arrays ($arr1, $arr2) {
    $merged_array = array();
    for($i = 0; $i < count($arr1); $i++){
    //set $i counter to access each index in arrays
        if ($arr1[$i] !== $arr2[$i]) {
            //if names at the same index are not the same push name from 1st array then 2nd array
            array_push($merged_array, $arr1[$i], $arr2[$i]);
        } else {
            //if names at same index are the same only push one instance of the name
            array_push($merged_array, $arr1[$i]);
        }
    }
    return $merged_array;
}

function combine_array2 ($arr1, $arr2) {
    $merged_array = [];
    foreach($arr1 as $i => $name) {
    // go through each name in arr1
        if (array_search($name, $arr2) !== false) {
        //if the name is found in arr2 push name only 1 time to merged array
            array_push($merged_array, $name);
        } else {
        //elseif not found, push name and name from 2nd array at the same index
            array_push($merged_array, $name, $arr2[$i]);
        }
        //increment $i counter forEach pass of arr1
        $i++;
    }
    return $merged_array;
}

print_r(combine_array2($names, $compare));
/*echo "\t" . searchArray('Tina', $names);
echo "\t" . searchArray('Bob', $names);
echo '--__-_-_--  --__-_-__-- ' . PHP_EOL;
echo "\t   " . compareArray($names, $compare) . PHP_EOL;
echo '--__-_-_--  --__-_-__-- ' . PHP_EOL;*/
// print_r($new_array);