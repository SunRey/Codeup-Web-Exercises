<?php 
    class Rectangle 
    {
        private $height;
        private $width;

        public function __construct($height, $width)
        {
            $this->setHeight($height);
            $this->setWidth($width);
        }

        private function setHeight($height)
        {
            $this->height = (is_numeric($height))? $height : 0;
        }

        private function setWidth($width)
        {
            $this->width = (is_numeric($width))? $width : 0;
        }

        public function getHeight()
        {
            return $this->height;
        }

        public function getWidth()
        {
            return $this->width;
        }

        public function getArea()
        {
            return $this->height * $this->width . PHP_EOL;
        }

        public function getPerimeter()
        {
            return ($this->height * 2) + ($this->width * 2) . PHP_EOL;
        }
    }
?>