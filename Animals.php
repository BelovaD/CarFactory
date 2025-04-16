<?php

interface Animal {
    public function make_sound(): string;
}

class Lion implements Animal {
    public function make_sound(): string {
        return "Рык";
    }
}

class Monkey implements Animal {
    public function make_sound(): string {
        return "Крик";
    }
}

class Elephant implements Animal {
    public function make_sound(): string {
        return "Гудение";
    }
}

abstract class AnimalFactory {
    abstract public function create_animal(): Animal;
}

class LionFactory extends AnimalFactory {
    public function create_animal(): Animal {
        return new Lion();
    }
}

class MonkeyFactory extends AnimalFactory {
    public function create_animal(): Animal {
        return new Monkey();
    }
}


class ElephantFactory extends AnimalFactory {
    public function create_animal(): Animal {
        return new Elephant();
    }
}

$lion_factory = new LionFactory();
$lion = $lion_factory->create_animal();
echo $lion->make_sound() . PHP_EOL; 

$monkey_factory = new MonkeyFactory();
$monkey = $monkey_factory->create_animal();
echo $monkey->make_sound() . PHP_EOL; 

$elephant_factory = new ElephantFactory();
$elephant = $elephant_factory->create_animal();
echo $elephant->make_sound() . PHP_EOL; 