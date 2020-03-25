<?php
    require 'Car.php';

    $mazda = new Car(2);
    $ford = new Car();

    echo "Do the cars have the same size? " . ($mazda->getLength() == $ford->getLength() ? "TRUE" : "FALSE") . "<br>";
    
    $ford->setLength(4);
    
    echo "The ford now has the length: " . $ford->getLength() . "<br>";
    echo "Do the cars still have the same size? " . ($mazda->getLength() == $ford->getLength() ? "TRUE" : "FALSE") . "<br>";
?>
