<?php

interface iCar{
  // Methods
  public function setLength($length);
  public function getLength();
}

class Car implements iCar{
  // Properties
  public $length;

  public function setLength($length) {
    $this->length = $length;
  }
  public function getLength() {
    return $this->length;
  }

}


$mazda = new Car();
$ford = new Car();

$mazda->setLength(10);
$ford->setLength(5);

if($mazda->getLength()>$ford->getLength())
{
  echo "Mazda is longer than Ford" . "</br></br>";
}
else if ($ford->getLength()>$mazda->getLength())
{
  echo "Ford is longer than Mazda" . "</br></br>";
}
else {
  echo "they are both of the same size" . "</br></br>";
}

echo "mazda length : " . $mazda->getLength() . "</br>" ;
echo "ford length : " . $ford->getLength() . "</br>" ;
var_dump($mazda);
?>
