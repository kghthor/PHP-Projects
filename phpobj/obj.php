<?php
//Using New keyboard
class MyClass {
    public $property;
    
    public function __construct($value) {
        $this->property = $value;
    }
    
    public function myMethod() {
        return "Hello, " . $this->property;
    }
}

$object = new MyClass("World");
echo $object->myMethod(); // Output: Hello, World

//Using Factory Method
class MyClass {
    public $property;
    
    public function __construct($value) {
        $this->property = $value;
    }
    
    public function myMethod() {
        return "Hello, " . $this->property;
    }
    
    public static function create($value) {
        return new self($value);
    }
}

$object = MyClass::create("World");
echo $object->myMethod(); // Output: Hello, World

//Using Reflection class
class MyClass {
    public $property;
    
    public function __construct($value) {
        $this->property = $value;
    }
    
    public function myMethod() {
        return "Hello, " . $this->property;
    }
}

$reflectionClass = new ReflectionClass('MyClass');
$object = $reflectionClass->newInstance('World');
echo $object->myMethod(); // Output: Hello, World

//using unserilize
class MyClass {
    public $property;
    
    public function __construct($value) {
        $this->property = $value;
    }
    
    public function myMethod() {
        return "Hello, " . $this->property;
    }
}

$serializedObject = 'O:7:"MyClass":1:{s:8:"property";s:5:"World";}';
$object = unserialize($serializedObject);
echo $object->myMethod(); // Output: Hello, World

//using Clone
class MyClass {
    public $property;
    
    public function __construct($value) {
        $this->property = $value;
    }
    
    public function myMethod() {
        return "Hello, " . $this->property;
    }
}

$originalObject = new MyClass("World");
$clonedObject = clone $originalObject;
echo $clonedObject->myMethod(); // Output: Hello, World

?>
