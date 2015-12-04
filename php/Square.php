<?php
    require 'Rectangle.php';

    class Square extends Rectangle
    {
        public function getPerimeter()
        {
            return ($this->height * 2) + ($this->width * 2) . PHP_EOL;
        }
    }