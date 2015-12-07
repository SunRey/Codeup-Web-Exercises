<?php 
    require_once 'Square.php';

    $smallRect = new Rectangle(10, 6);
    echo "This is the area of 10 & 6 = {$smallRect->getArea()}";
    echo "This is the perimeter of said shape = {$smallRect->getPerimeter()}";

    echo PHP_EOL;

    $largeRect = new Rectangle(42, 33);
    echo "This is the area of 42 & 33 {$largeRect->getArea()}";
    echo "This is the perimeter of said shape = {$largeRect->getPerimeter()}";

    echo PHP_EOL;

    $smallSqua = new Square(6);
    echo "This is the area square with 6 = {$smallSqua->getArea()}";
    echo "This is the perimeter of said shape = {$smallSqua->getPerimeter()}";

    echo PHP_EOL;

    $largeSqua = new Square(42);
    echo "This is the area square with 42 = {$largeSqua->getArea()}";
    echo "This is the perimeter of said shape = {$largeSqua->getPerimeter()}";
?>