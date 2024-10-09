<?php
class Animal {
    public function makeSound() {
        echo "Some generic animal sound\n";
    }
}

class Dog extends Animal {
    public function makeSound() {//Polymorphism is achieved through method overriding and interfaces in PHP.
        echo "Bark\n";
    }
}

class Cat extends Animal {
    public function makeSound() {
        echo "Meow\n";
    }
}

function animalSound(Animal $animal) {
    $animal->makeSound();
}

$dog = new Dog();
$cat = new Cat();

animalSound($dog); // Output: Bark
animalSound($cat); // Output: Meow
?>
