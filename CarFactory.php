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

