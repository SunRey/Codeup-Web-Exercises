<?php

    $things = array('Sgt. Pepper', "11", null, array(1,2,3), 3.14, "12 + 7", false, (string) 11);
    foreach ($things as $junk) {
    
        if (is_array($junk)) {
            echo "Array (  ";
            foreach ($junk as $what_is) {
                echo "{$what_is}\t";
            }
            echo " )\n";
        } elseif (is_integer($junk)) {
            echo "{$junk}\n";
        } elseif (is_bool($junk)) {
            echo "{$junk}\n";
        } elseif (is_float($junk)) {
            echo "{$junk}\n";
        } elseif (is_null($junk)) {
            echo "\n";
        } elseif (is_string($junk)) {
            echo "{$junk}\n";
        }
        // if (is_scalar($junk)) {
        //     echo gettype($junk) . PHP_EOL; 
        //     echo "{$junk} is a type of scalar?\n";
        // }
    }