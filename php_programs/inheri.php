//Multiple Inheritana
<?php
interface Logger {
    public function log($message);
}

interface Cache {
    public function cache($data);
}

class MyClass implements Logger, Cache {
    public function log($message) {
        echo "Logging message: $message";
    }

    public function cache($data) {
        echo "Caching data: $data";
    }
}
//Trait
?>
<?php
trait Logger {
    public function log($message) {
        echo "Logging message: $message";
    }
}

trait Cache {
    public function cache($data) {
        echo "Caching data: $data";
    }
}

class MyClass {
    use Logger, Cache;
}

$obj = new MyClass();
$obj->log("Test log");
$obj->cache("Test data");
?>
<?php
class A {
    public function methodA() {
        echo "Method A";
    }
}

class B extends A {
    public function methodB() {//multi level
        echo "Method B";
    }
}

class C extends B {
    public function methodC() {
        echo "Method C";
    }
}

$c = new C();
$c->methodA(); // Output: Method A
$c->methodB(); // Output: Method B
$c->methodC(); // Output: Method C
?>
<?php
interface Logger {
    public function log($message);
}

trait Cache {
    public function cache($data) {
        echo "Caching data: $data";
    }
}

class BaseClass {
    public function baseMethod() {
        echo "Base Method";
    }//Hybrid inheritance
}

class DerivedClass extends BaseClass implements Logger {
    use Cache;

    public function log($message) {
        echo "Logging message: $message";
    }

    public function derivedMethod() {
        echo "Derived Method";
    }
}//USING TRAITS AND INTERFACES

$derived = new DerivedClass();
$derived->baseMethod(); // Output: Base Method
$derived->log("Test log"); // Output: Logging message: Test log
$derived->cache("Test data"); // Output: Caching data: Test data
$derived->derivedMethod(); // Output: Derived Method
?>