<?php 
    require_once 'Square.php';

    $smallRect = new Rectangle(10, 6);
    echo $smallRect->area();

    $largeRect = new Rectangle(42, 33);
    echo $largeRect->area();

    $smallSqua = new Square(6, 6);
    echo $smallSqua->area();
    echo $smallSqua->getPerimeter();

    $largeSqua = new Square(42, 42);
    echo $largeSqua->area();
    echo $largeSqua->getPerimeter();
?>