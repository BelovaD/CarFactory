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
    public function hasGasolineEngine(): bool{
        return false;
    }
    public function hasHybridEngine(): bool{
        return false;
    }
}

class PetrolCar implements Car {

    public function hasGasolineEngine(): bool{
        return true;
    }
    public function hasElectricEngine(): bool {
        return false;
    }
    public function hasHybridEngine(): bool{
        return false;
    }
}

class HybridCar implements Car {
    public function hasHybridEngine(): bool{
        return true;
    }
    
    public function hasElectricEngine(): bool {
        return false;
    }
    public function hasGasolineEngine(): bool{
        return false;
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

