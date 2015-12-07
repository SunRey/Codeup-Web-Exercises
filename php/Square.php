<?php
    require 'Rectangle.php';

    class Square extends Rectangle
    {
        public function __construct($height)
        {
            parent::__construct($height, $height);
        }

    }