<?php

function add($a, $b)
{
    if (is_numeric($a) && is_numeric($b)) {
        return $a + $b;
    } else {
        return "ERROR: Both arguments must be numbers\n";
    }
}

function subtract($a, $b)
{
    if (is_numeric($a) && is_numeric($b)) {
        return ($a >= $b) ? ($a - $b) : ($b - $a);
    } else {
        return "ERROR: Both arguments must be numbers\n";
    }
}

function multiply($a, $b)
{
    if (is_numeric($a) && is_numeric($b)) {
        return $a * $b;
    } else {
        return "ERROR: Both arguments must be numbers\n";
    }
}

function divide($a, $b)
{
    if (is_numeric($a) && is_numeric($b)) {
        return ($a >= $b) ? ($a / $b) : ($b / $a);
    } else {
        return "ERROR: Both arguments must be numbers\n";
    }
}

function modulus($a, $b)
{
    if (is_numeric($a) && is_numeric($b)) {
        return ($a >= $b) ? ($a % $b) : ($b % $a);
    } else {
        return "ERROR: Both arguments must be numbers\n";
    }
}

$a = mt_rand ( 1 , 100 );
$b = mt_rand ($a, ($a + 100) );

echo PHP_EOL;
echo 'The random numbers to math are ' . $a . ' & ' . $b . PHP_EOL;
echo add($a, $b) . ' : is the sum.' . PHP_EOL;
echo subtract($a, $b) . ' : is the difference.' . PHP_EOL;
echo multiply($a, $b) . ' : is the product.' . PHP_EOL;
echo divide($a, $b) . ' : is the quotion.' . PHP_EOL;
echo modulus($a, $b) . " : is the remainder.\n" . PHP_EOL;
