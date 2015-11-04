<?php
    fwrite(STDOUT, 'Please enter a starting numeric value: ');
    $startValue = trim(fgets(STDIN));
    fwrite(STDOUT, 'Please enter a ending numeric value: ');
    $endValue = trim(fgets(STDIN));
    fwrite(STDOUT, 'Please enter a numeric increment value: ');
    $increment = trim(fgets(STDIN));

    if (empty($increment)) {
        $increment = 1;
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