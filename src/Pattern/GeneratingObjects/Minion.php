<?php

namespace App\Pattern\GeneratingObjects;

class Minion extends Employee
{
    public function fire(): void
    {
        echo "{$this->name}: I'll clear my desk\n";
    }
}
