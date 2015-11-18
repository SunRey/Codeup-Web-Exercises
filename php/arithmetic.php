<?php

if ($argc == 1) {
    $a = mt_rand ( 1 , 100 );
    $b = mt_rand ($a, ($a + 100) );
} elseif ($argc == 2) {
    if (validNumber($argv[1])) {
        $a = (int)$argv[1];
        $b = mt_rand ($a, ($a + 100) );
    } else {
        giveThemError();
    }
} elseif ($argc == 3) {
    if (validNumber($argv[1]) && validNumber($argv[2])) {
        $a = (int)$argv[1];
        $b = (int)$argv[2];
    } else {
        giveThemError();
    }
} else {
    die('TOO MANY args passed it; like a Tur-duc-ken!' . PHP_EOL;);
}


function giveThemError () {
    echo "Make sure your number(s) are only numeric values!!\n";
    exit(0);
}

function validNumber ($num) {
    if (is_numeric($num)) {
        return true;
    } else {
        return false;
    }
}

function add($a, $b)
{
    return ($a + $b) . ' : is the sum.' . PHP_EOL;
}

function subtract($a, $b)
{
    return ($a >= $b) ? ($a - $b) . ' : is the difference.' . PHP_EOL : ($b - $a) . ' : is the difference.' . PHP_EOL;
}

function multiply($a, $b)
{
    return ($a * $b)  . ' : is the product.' . PHP_EOL;
}

function divide($a, $b)
{
    if ($a == 0 || $b == 0) {
        return "We don't DO 0" . PHP_EOL;;
    } else {
        return ($a >= $b) ? ($a / $b)  . ' : is the quotion.' . PHP_EOL : ($b / $a)  . ' : is the quotion.' . PHP_EOL;
    }
}

function modulus($a, $b)
{
    if ($a == 0 || $b == 0) {
        return "We don't DO 0" . PHP_EOL;
    } else {
        return ($a >= $b) ? ($a % $b)  . " : is the remainder.\n" . PHP_EOL : ($b % $a)  . " : is the remainder.\n" . PHP_EOL;
    }
}

echo PHP_EOL;
echo 'The random numbers to math are ' . $a . ' & ' . $b . PHP_EOL;
echo add($a, $b);
echo subtract($a, $b);
echo multiply($a, $b);
echo divide($a, $b);
echo modulus($a, $b);

