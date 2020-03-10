<?php

include "iCar.php";

class Car implements iCar{
    private $lenght;
    private $brand;

    public function setLenght($lenght){
        $this->lenght = $lenght;
    }
    
    public function setBrand($brand){
        $this->brand = $brand;
    }
    
    public function __toString() {
        echo $this->$lenght;
        echo $this->$brand;
    }
}
?>