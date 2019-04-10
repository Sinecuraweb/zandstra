<?php

namespace App\Pattern\GeneratingObjects\Singleton;

class Preferences
{
    /**
     * @var array
     */
    private $props = [];

    /**
     * @var static
     */
    private static $instance;

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (null === static::$instance) {
            static::$instance = new Preferences();
        }

        return static::$instance;
    }

    public function addProperty(string $key, string $value): void
    {
        $this->props[$key] = $value;
    }

    public function getProperty(string $key): string
    {
        return $this->props[$key];
    }
}
