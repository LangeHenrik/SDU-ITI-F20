<?php 

include_once("Car.php");

$mazda = new Car("mazda" ,3);
$ford = new Car("ford",2);

$mazda->getLength();
$ford->getLength();

$mazda->__toString();
$ford->__toString();

Car::compareObjects($mazda, $ford);
Car::compareObjects($ford, $mazda);

$mazda->setLength(4);
$ford->setLength(6);

$mazda->getLength();
$ford->getLength();

$mazda->__toString();
$ford->__toString();

?>