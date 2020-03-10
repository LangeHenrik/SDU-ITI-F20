<?php

/**
 * Interface for Car
 */
interface iCar
{
  public function getLength();
  public function setLength($length);
  public function getName();
  public function setName($name);
}

class Car implements iCar
{
  public $length;
  public $name;

  public function setLength($length){
    $this->length = $length;
  }

  public function getLength(){
     return $this->length;
  }

  public function setName($name){
    $this->name = $name;
  }

  public function getName(){
    return $this->name;
  }

  public function compare($a, $b)
  {
      if ($a->emp_id < $b->emp_id) return -1;
      else if($a->emp_id == $b->emp_id) return 0;
      else return 1;
  }
  public function __toString()
  {
      return "Car[model=$this->name, heigth=$this->length]";
  }

}

  $car1 = new Car();
  $car2 = new Car();

  $car1->setName('Mazda');
  $car2->setName('Ford');

  $car1->setLength(50);
  $car2->setLength(30);
  var_dump($car1);
  echo "<br/>";
  var_dump($car2);
  echo "<br/>";
  echo $car1;
  echo "<br/>";
  echo $car2;

  //
  // echo $car1->getName();
  // echo "<br/>";
  //
  // echo $car2->getName();
  // echo "<br/>";
  //
  // echo $car1->getLength();
  // echo "<br/>";
  // echo $car2->getLength();





?>
