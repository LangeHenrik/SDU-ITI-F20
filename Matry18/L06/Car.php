<?php

include "iCar.php";

class Car implements iCar{
    private $length;
    private $brand;

    public function setLength($length){
        $this->length = $length;
    }
    
    public function setBrand($brand){
        $this->brand = $brand;
    }

    public function getBrand(){
        return $this->brand;
    }

    public function getLength(){
        return $this->length;
    }
    
}
?>