<?php
    require 'Rectangle.php';

    class Square extends Rectangle
    {
        public function getPerimeter()
        {
            return $this->height * 4 . PHP_EOL;
        }
    }