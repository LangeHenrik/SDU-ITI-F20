<?php
    require 'ICar.php';

    class Car implements ICar 
    {
        protected $length;

        function __construct($initiaLength = 2) 
        {
            $this->length = $initiaLength;
        }

        public function getLength()
        {
            return $this->length;
        }

        public function setLength($newLength) 
        {
            $this->length = $newLength;
        }
    }
?>