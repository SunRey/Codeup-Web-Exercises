<?php
    if ($argc < 2) {
        fwrite(STDOUT, 'Please enter a starting numeric value: ');
        $startValue = trim(fgets(STDIN));
        if (!is_numeric($startValue)) {
            die('NOT a numeric value');
        }
    } else {
        $startValue = $argv[1];
    }

    if ($argc < 3) {
        fwrite(STDOUT, 'Please enter a ending numeric value: ');
        $endValue = trim(fgets(STDIN));
        if (!is_numeric($endValue)) {
            die('NOT a numeric value');
        }
    } else {
        $endValue = $argv[2];
    }
    if ($argc < 4) {
        fwrite(STDOUT, 'Please enter a numeric increment value: ');
        $increment = trim(fgets(STDIN));
        if (empty($increment)) {
            $increment = 1;
        }
    } else {
        $increment = $argv[3];
    }


    for ($i = $startValue ; $i <= $endValue ; $i += $increment) {
        if ($i % 3 == 0 && $i % 5 == 0) {
            echo "FizzBuzz\n";
        } else if ($i % 3 == 0) {
            echo "Fizz\n";
        } else if ($i % 5 == 0) {
            echo "Buzz\n";
        } 
        else {
            echo "$i\n";
        }
    }
?>