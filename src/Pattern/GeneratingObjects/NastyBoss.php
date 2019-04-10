<?php

namespace App\Pattern\GeneratingObjects;

class NastyBoss
{
    /**
     * @var Employee[]
     */
    private $employees = [];

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function projectFails(): void
    {
        if ([] !== $this->employees) {
            array_pop($this->employees)->fire();
        }
    }
}
