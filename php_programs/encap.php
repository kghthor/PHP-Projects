<?php
class Person {
    private $name;
    private $age;

    // Public method to set the private properties
    public function setName($name) {
        $this->name = $name;
    }//Encapsulation is achieved by using access modifiers: public, protected, and private.

    public function setAge($age) {
        if ($age > 0) {
            $this->age = $age;
        } else {
            echo "Age must be a positive number\n";
        }
    }

    // Public method to get the private properties
    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }
}

$person = new Person();
$person->setName("John Doe");
$person->setAge(30);

echo "Name: " . $person->getName() . "\n"; // Output: Name: John Doe
echo "Age: " . $person->getAge() . "\n";   // Output: Age: 30
?>
