<?php
interface Device {
    public function isEnabled(): bool;
    public function enabled(): void;
    public function disabled(): void;
    public function getVolume(): int;
    public function setVolume(int $value): void;
    public function getChannel(): int;
    public function setChannel(int $value): void;
    
}

class Radio implements Device {
    private int $min_volume = 0;
    private int $max_volume = 10;
    private int $min_channel = 0;
    private int $max_channel = 10;
    private bool $is_enabled = false;
    private int $curr_volume=0;
    private int $curr_channel=0;

    public function isEnabled(): bool{
        return $this->is_enabled;
    }

    public function enabled(): void {
        $this->is_enabled = true;
    }
    public function disabled(): void {
        $this->is_enabled = false;
    }
    public function getVolume(): int {
        if ($this->isEnabled()) 
            return $this->curr_volume;
            return 0;
    }
    public function setVolume(int $value): void {
        if ($this->isEnabled() && $value > $this->min_volume
        && $value <= $this->max_volume) {
            $this->curr_volume = $value;
        }
    }
    public function getChannel(): int {
        if($this->isEnabled())
            return $this->curr_channel;
        return 0;
    }

    public function setChannel(int $value): void{
            if ($this-> isEnabled() && $value >= $this->min_channel && $value <= $this->max_channel) {
                $this->curr_channel = $value;
            }
        }    
    }


abstract class Remote {
    public Device $device;

    public function __construct(Device $device) 
    {
        $this ->device = $device;
    }

        public function togglePower(): void {
            if ($this->device->isEnabled()){
                $this->device->disabled();
            } else {
                $this->device->enabled();
            }
        }
        public function volumeDown(): void {
            if ($this ->device->isEnabled()){
            $this->device-> setVolume($this->device->getVolume() - 1);
            }
        }
        public function volumeUp(): void {
            if ($this ->device->isEnabled()){
            $this->device->setVolume($this->device->getVolume() + 1);
            }
        }
    
        public function channelDown(): void {
            if ($this ->device->isEnabled()){
            $this->device->setChannel($this->device->getChannel() - 1);
            }
        }
        public function channelUp(): void {
            if ($this ->device->isEnabled()){
            $this->device->setChannel($this->device->getChannel() + 1);
            }
        }
    }

  

    class AdvancedRemote extends Remote {
        private int $prev_volume;

        public function mute(): void {
        if ($this ->device->isEnabled()){
            return;}
        $need_volume = 0;
        if ($this->device->getVolume() !== 0) {
            $this->prev_volume = $this->device->getVolume();
        } else {
            $need_volume = $this->prev_volume;
        }
        $$this->device->setVolume($need_volume);
    }
}

$radio = new Radio();
echo 'Volume: ' . $radio->getVolume() . PHP_EOL;
echo 'Channel: ' . $radio->getChannel() . PHP_EOL;
$$remote = new AdvancedRemote($radio);
$radio->setVolume(2);
$$radio->setChannel(3);
echo 'Volume: ' . $radio->getVolume() . PHP_EOL;
echo 'Channel: ' . $radio->getChannel() . PHP_EOL;
$remote->togglePower();
$radio->setVolume(2);
$$radio->setChannel(3);
echo 'Volume: ' . $radio->getVolume() . PHP_EOL;
echo 'Channel: ' . $radio->getChannel() . PHP_EOL;
$remote->volumeUp();
$remote->channelDown();
echo 'Volume: ' . $radio->getVolume() . PHP_EOL;
echo 'Channel: '. $radio->getChannel() . PHP_EOL;    