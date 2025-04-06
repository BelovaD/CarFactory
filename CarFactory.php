<?php

interface Car {
    public function hasElectricEngine(): bool;
    public function hasGasolineEngine(): bool;
    public function hasHybridEngine(): bool;
}

class ElectricCar implements Car {
    public function hasElectricEngine(): bool {
        return true;
    }
}

class PetrolCar implements Car {
    public function hasGasolineEngine(): bool{
        return true;
    }
}

class HybridCar implements Car {
    public function hasHybridEngine(): bool{
        return true;
    }
    
}

interface carFactory {
    public function createCar(): Car;
}

class ElectricCarFactory implements CarFactory {
    public function createCar(): Car{
        return new ElectricCar();
    }
}
class PetrolCarFactory implements CarFactory {
    public function createCar(): Car {
        return new PetrolCar();
    }
}
class HybridCarFactory implements CarFactory {
    public function createCar(): Car {
        return new HybridCar();
    }
}

$carFactory = new ElectricCarFactory();
$car = $carFactory->createCar();

$carFactory = new PetrolCarFactory();
$car = $carFactory->createCar();

$carFactory = new HybridCarFactory();
$car = $carFactory->createCar();

