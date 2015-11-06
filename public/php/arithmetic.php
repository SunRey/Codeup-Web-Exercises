<?php

function add($a, $b)
{
    return $a + $b;
}

function subtract($a, $b)
{
    return ($a >= $b) ? ($a - $b) : ($b - $a);
}

function multiply($a, $b)
{
    return $a * $b;
}

function divide($a, $b)
{
    return ($a >= $b) ? ($a / $b) : ($b / $a);
}

function modulus($a, $b)
{
    return ($a >= $b) ? ($a % $b) : ($b % $a);
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
