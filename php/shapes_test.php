<?php 
    require_once 'rectangle.php';

    $smallRect = new Rectangle(10, 6);
    echo $smallRect->area();

    $largeRect = new Rectangle(42, 33);
    echo $largeRect->area();
?>