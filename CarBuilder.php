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