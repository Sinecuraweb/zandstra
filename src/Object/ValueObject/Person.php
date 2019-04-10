<?php

namespace App\Object\ValueObject;

use App\Object\Writer\PersonWriter;

class Person
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @param PersonWriter $writer
     */
    public function output(PersonWriter $writer): void
    {
        $writer->write($this);
    }

    /**
     * @return string
     */
    public function toName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function toAge(): int
    {
        return $this->age;
    }
}
