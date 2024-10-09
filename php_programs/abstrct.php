<?php
abstract class Vehicle {
    // Abstract method (no implementation)
    abstract public function start();

    // Non-abstract method
    public function stop() {
        echo "Vehicle stopped\n";
    }
}//abstract class

class Car extends Vehicle {
    // Implementing the abstract method
    public function start() {
        echo "Car started\n";
    }
}

$car = new Car();
$car->start(); // Output: Car started
$car->stop();  // Output: Vehicle stopped
?>
<?php
interface Drivable {
    public function start();
    public function stop();
}

class Bike implements Drivable {
    public function start() {
        echo "Bike started\n";
    }//using interface

    public function stop() {
        echo "Bike stopped\n";
    }
}

$bike = new Bike();
$bike->start(); // Output: Bike started
$bike->stop();  // Output: Bike stopped
?>
