<?php

namespace App\Pattern\GeneratingObjects;

abstract class Employee
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    private static $types = ['Minion', 'ClueUp', 'WellConnected'];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public static function recruit(string $name): Employee
    {
        $class = sprintf(
            '%s\\%s',
            __NAMESPACE__,
            static::$types[array_rand(static::$types, 1)]
        );

        return new $class($name);
    }

    abstract public function fire(): void;
}
