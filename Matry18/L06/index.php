<?php
include "Car.php";
$car1 = new Car;
$car1->setLength('3,4 meter');
$car1->SetBrand('Ford');

$car1.toString();

$car2 = New Car;
$car2->setLenght('3 meter');
$car2->setBrand('Mazda');

$car2.toString();

?>