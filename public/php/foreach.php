<?php

    $things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", false, (string) 11);
    foreach ($things as $junk) {
    
        if (is_array($junk)) {
            echo "This is an array\n";
            // foreach ($junk as $what_is) {
            //     echo $what_is . "\n";
            // }
        } elseif (is_integer($junk)) {
            echo "{$junk} is a integer\n";
        } elseif (is_bool($junk)) {
            echo "{$junk} is a boolean\n";
        } elseif (is_float($junk)) {
            echo "{$junk} could be a float... ";
            if (is_double($junk)) {
                echo "AND {$junk} could also be a double\n";
            }
        } elseif (is_null($junk)) {
            echo "{$junk} has a null value\n";
        } elseif (is_string($junk)) {
            echo "I am the catch all string machine\n";
        }
    }