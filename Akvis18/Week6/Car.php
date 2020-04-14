<?php
interface ICar
{
    public function setLength($length);
    public function getLength();
}
class Car implements ICar
{
    private $length;
    private $brand;
    function __construct ($length, $brand) {
        $this->brand = $brand;
        $this->length = $length;
    }

    function __toString()
    {
       return $this->brand.' '.$this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getLength()
    {
        return $this->length;
    }
}

$ford = new Car('540', 'ford');
$mazda = new Car('520', 'mazda');
var_dump([$ford, $mazda]);
print ($ford->getLength() > $mazda->getLength()) ? $ford : $mazda;
$mazda->setLength('600');
var_dump([$ford, $mazda]);
print ($ford->getLength() > $mazda->getLength()) ? $ford : $mazda;