<?php

interface Device {
    public function turn_on():void;
    public function turn_off():void;
    public function set_state():bool;
    
}

abstract class AbstractDevice implements Device {
    private bool $state = false;

    public function turn_on(): void {
        $this->state = true;
    }

    public function turn_off(): void {
        $this->state = false;
    }

    public function set_state(): bool {
        return $this->state;
    }

}

abstract class RemoteControl {
    protected Device $device;


    public function __construct(Device $device) {
        $this->device = $device;
    }

    public function togglePower(): void {
        if ($this->device->state === true) {
            $this->device->turn_off();
        } else {
            $this->device->turn_on();
        }
    }

    public function set_device_state(string $state): void {
        $this->device->set_state($state);
    }
}

abstract class TV extends AbstractDevice {
    protected string $type;

    public function __construct(string $brand) {
        $this->type = $type;
    }

    public function turn_on(): void {
        parent::turn_on();
        echo $this->type . 'TV is turned on' . PHP_EOL;
    }

    public function turn_off(): void {
        parent::turn_off();
        echo $this->type . 'TV is turned off' . PHP_EOL;
    }
}

abstract class Light extends AbstractDevice {
    protected string $type;

    public function __construct(string $type) {
        $this->type = $type;
    }

    public function turn_on(): void {
        parent::turn_on();
        echo $this->type . ' Light is turned on' . PHP_EOL;
    }

    public function turn_off(): void {
        parent::turn_off();
        echo $this->type . ' Light is turned off' . PHP_EOL;
    }
}

abstract class SonyTV extends TV {
    public function __construct() {
        parent::__construct('Sony');
    }
}

abstract class SamsungTV extends TV {
    public function __construct() {
        parent::__construct(brand: 'Samsung');
    }
}

abstract class PhilipsLight extends Light {
    public function __construct() {
        parent::__construct('Philips');
    }
}

abstract class IKEALight extends Light {
    public function __construct() {
        parent::__construct('IKEA');
    }
}


