<?php

include_once("ICar.php");

class Car implements ICar
{

    private $length;
    private $name;

    public function __construct($name, $len)
    {

        $this->name = $name;
        $this->length = $len;
    }

    public function getLength()
    {
        echo  $this->length . "<br>";
    }

    public function getName()
    {
        echo $this->name;
    }
    public function setLength($length)
    {
        $this->length = $length;
    }

    public static function compareObjects($object1, $object2)
    {
        echo self::bool2str($object1 == $object2) . "<br>";
    }
    public static function bool2str($bool)
    {
        if ($bool === false) {
            return 'not the same length';
        } else {
            return 'the same length';
        }
    }

    public function __toString()
    {
        echo "The cars names is: " . $this->name . " and it is " . $this->length . " in length" . "<br>";
    }
}
