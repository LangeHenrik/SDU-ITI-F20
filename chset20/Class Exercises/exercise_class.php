<?php
Interface iCar{
	public function getLength();
	public function setLength($newLength);
}

Class Car implements iCar{
	private $length;
	public function getLength(){
		return $this->length;
	}
	public function setLength($newLength){
		$this->length = $newLength;
	}
}

$mazda = new Car;
$ford = new Car;
$mazda->setLength(100);
$ford->setLength(80);

echo $mazda->getLength() - $ford->getLength();
?>
