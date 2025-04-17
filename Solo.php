<?php

class GameSettings
{
    private static $instance;

    private $settings;

    private function __construct()
    {
        $this->settings = [
            'fullscreen' => false,
            'volume' => 50,
            'difficulty' => 'easy',
        ];
    }

    public static function getInstance(): GameSettings
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getSettings(): array
    {
        return $this->settings;
    }

    public function setSetting(string $key, $value): void
    {
        if (array_key_exists($key, $this->settings)) {
            $this->settings[$key] = $value;
        }
    }
}

$gameSettings = GameSettings::getInstance();
print_r($gameSettings->getSettings());

$gameSettings->setSetting('fullscreen', true);
$gameSettings->setSetting('volume', 70);
$gameSettings->setSetting('difficulty', 'hard');
print_r($gameSettings->getSettings());

?>