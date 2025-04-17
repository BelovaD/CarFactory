<?php

class Engine {
    public $type;
    public $power;
    public $volume;

    public function __construct(string $type, int $power, float $volume) {
        $this->type = $type;
        $this->power = $power;
        $this->volume = $volume;
    }

    public function getEngineInfo(): string {
        return "Тип: {$this->type}, мощность: {$this->power} л.с., объём: {$this->volume} л.";
    }
}

class Transmission {
    public $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function getTransmissionInfo(): string {
        return "Тип трансмиссии: {$this->type}";
    }
}

class Body {
    public $type;
    public $color;

    public function __construct(string $type, string $color) {
        $this->type = $type;
        $this->color = $color;
    }

    public function getBodyInfo(): string {
        return "Тип кузова: {$this->type}, цвет: {$this->color}";
    }
}


class ControlSystem {
    public $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function getControlSystemInfo(): string {
        return "Тип системы управления: {$this->type}";
    }
}

class BrakeSystem {
    public $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function getBrakeSystemInfo(): string {
        return "Тип тормозной системы: {$this->type}";
    }
}

class Car {
    public $engine;
    public $transmission;
    public $body;
    public $controlSystem;
    public $brakeSystem;

    public function __construct(Engine $engine, Transmission $transmission, Body $body, ControlSystem $controlSystem, BrakeSystem $brakeSystem)
    {
        $this->engine = $engine;
        $this->transmission = $transmission;
        $this->body = $body;
        $this->controlSystem = $controlSystem;
        $this->brakeSystem = $brakeSystem;
    }
}

class CarBuilder {
    protected $engine;
    protected $transmission;
    protected $body;
    protected $controlSystem;
    protected $brakeSystem;

    public function setEngine(Engine $engine): void {
        $this->engine = $engine;
    }

    public function setTransmission(Transmission $transmission): void {
        $this->transmission = $transmission;
    }

    public function setBody(Body $body): void {
        $this->body = $body;
    }

    public function setControlSystem(ControlSystem $controlSystem): void {
        $this->controlSystem = $controlSystem;
    }

    public function setBrakeSystem(BrakeSystem $brakeSystem): void {
        $this->brakeSystem = $brakeSystem;
    }

    public function createCar(): Car {
        return new Car(
            $this->engine, 
            $this->transmission, 
            $this->body, 
            $this->controlSystem, 
            $this->brakeSystem);
    }
}


class SedanBuilder implements CarBuilder{
    private $car;

    public function __construct()
    {
        $this->car = new Car(null, null, null,null, null);
    }

    public function setEngine(Engine $engine): void
    {
        $this->car->engine = $engine;
    }

    public function setTransmission(Transmission $transmission): void
    {
        $this->car->transmission = $transmission;
    }

    public function setBody(Body $body): void
    {
        $this->car->body = $body;
    }

    public function setControlSystem(ControlSystem $controlSystem): void {
        $this->controlSystem = $controlSystem;
    }

    public function setBrakeSystem(BrakeSystem $brakeSystem): void {
        $this->brakeSystem = $brakeSystem;
    }

    public function getCar(): Car
    {
        return $this->car;
    }
}


class CarDirector
{
    private $builder;

    public function __construct(CarBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildCar(): Car
    {
        $engine = new Engine('V6', '210','4');
        $transmission = new Transmission('automatic');
        $body = new Body('SUV','red');
        $brakeSystem = new brakeSystem('disc brake');
        $controlSystem = new controlSystem('gear - rack');

        $this->builder->setEngine($engine);
        $this->builder->setTransmission($transmission);
        $this->builder->setBody($body);

        return $this->builder->getCar();
    }
}
