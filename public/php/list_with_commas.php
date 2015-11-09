<?php
    $physicists_string = 'Gordon Freeman, Samantha Carter, Sheldon Cooper, Quinn Mallory, Bruce Banner, Tony Stark';
    $physicists_array = explode(', ', $physicists_string);
    $physicists_array = addAndString($physicists_array);
    $famousFakePhysicists = implode(', ', $physicists_array);
    echo "Some of the most famous fictional theoretical physicists are {$famousFakePhysicists}.\n";

    function addAndString ($array) {
        $temp = array_pop($array);
        array_push($array, 'and');
        array_push($array, $temp);
        return $array;
    }


    // print_r($physicists_array);