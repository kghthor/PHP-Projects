<?php

class MyClass {
    public function myMethod() {
        return "Hello, World!";
    }
}

// Create an instance of MyClass
$obj = new MyClass();

// Access the method
echo $obj->myMethod();
function myFunction() {
    return "Hello, World!";
}

// Call the function
echo myFunction();
?>

<?php
class Car {
    public $color;
    public $model;

    public function setColor($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function getModel() {
        return $this->model;
    }
}
?>

<?php
// Access modifiers example
class Car {
    public $color;          // Public property
    protected $model;       // Protected property
    private $vinNumber;     // Private property

    public function setColor($color) {
        $this->color = $color;
    }

    public function getColor() {
        return $this->color;
    }

    protected function setModel($model) {
        $this->model = $model;
    }

    private function setVinNumber($vinNumber) {
        $this->vinNumber = $vinNumber;
    }
}
?>

<?php
class Car {
    public $color;
    public $model;

    // Constructor
    public function __construct($color, $model) {
        $this->color = $color;
        $this->model = $model;
    }

    // Destructor
    public function __destruct() {
        echo "Destroying " . $this->model;
    }
}
?>

<?php
// Static method example
class Car {
    public $color;
    protected $model;
    private $vinNumber;
    public static $count = 0;

    // Constructor
    public function __construct($color, $model, $vinNumber) {
        $this->color = $color;
        $this->model = $model;
        $this->vinNumber = $vinNumber;
        self::$count++;
    }

    // Public method
    public function getColor() {
        return $this->color;
    }

    // Protected method
    protected function getModel() {
        return $this->model;
    }

    // Private method
    private function getVinNumber() {
        return $this->vinNumber;
    }

    // Static method
    public static function getCount() {
        return self::$count;
    }

    // Destructor
    public function __destruct() {
        echo "Destroying " . $this->model;
    }
}

// Creating objects
$car1 = new Car('Red', 'Toyota', '123ABC');
$car2 = new Car('Blue', 'Honda', '456DEF');

// Accessing public method
echo $car1->getColor(); // Output: Red

// Accessing static method
echo Car::getCount(); // Output: 2

// Destructor will be called automatically at the end of the script or when the objects are unset
?>

<?php
// Example 2: Static methods and properties
class MathUtil {
    // Static property
    public static $pi = 3.14159;

    // Static method
    public static function calculateCircleArea($radius) {
        return self::$pi * $radius * $radius;
    }

    // Another static method
    public static function calculateCircleCircumference($radius) {
        return 2 * self::$pi * $radius;
    }
}

// Accessing static property directly on the class
echo "Value of Pi: " . MathUtil::$pi . "\n"; // Output: 3.14159

// Calling static methods directly on the class
echo "Area of a circle with radius 5: " . MathUtil::calculateCircleArea(5) . "\n"; // Output: 78.53975
echo "Circumference of a circle with radius 5: " . MathUtil::calculateCircleCircumference(5) . "\n"; // Output: 31.4159
?>

<?php
// Example 3: Incrementing static properties
class Car {
    public static $count = 0;

    public static function incrementCount() {
        self::$count++;
    }

    public static function getCount() {
        return self::$count;
    }
}

// Accessing static property directly on the class
echo Car::$count; // Output: 0

// Calling static method directly on the class
Car::incrementCount();
echo Car::getCount(); // Output: 1

// Incrementing the count again
Car::incrementCount();
echo Car::getCount(); // Output: 2
?>
