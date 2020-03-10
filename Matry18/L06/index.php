<?php
include "Car.php";

$car1 = new Car();
$car1->setLength('3,4 meter');
$car1->SetBrand('Ford');
$length1 = $car1->getLength();
$brand1 = $car1->getBrand();
echo $brand1;
echo "<br>";
echo $length1;
echo "<br>";
echo "<br>";


$car2 = New Car();
$car2->setLength('3 meter');
$car2->setBrand('Mazda');
$length2 = $car2->getLength();
$brand2 = $car2->getBrand();
echo $brand2;
echo "<br>";
echo $length2;


?>