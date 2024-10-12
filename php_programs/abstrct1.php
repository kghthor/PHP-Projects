<?php
// Abstract Class
abstract class Shape {
    // Abstract method
    abstract public function area();
}

class Circle extends Shape {
    private $radius;

    // Constructor to initialize radius
    public function __construct($radius) {
        $this->radius = $radius;
    }

    // Implementing abstract method from Shape
    public function area() {
        return pi() * pow($this->radius, 2);
    }
}

class Rectangle extends Shape {
    private $width;
    private $height;

    // Constructor to initialize width and height
    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }

    // Implementing abstract method from Shape
    public function area() {
        return $this->width * $this->height;
    }
}

// Polymorphic function to calculate area
function printArea(Shape $shape) {
    echo "The area is: " . $shape->area() . "\n";
}

// Creating objects of different types
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);

// Calling the same method for different objects
printArea($circle);    // Outputs area of Circle
printArea($rectangle); // Outputs area of Rectangle
?>
