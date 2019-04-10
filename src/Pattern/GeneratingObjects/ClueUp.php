<?php

namespace App\Pattern\GeneratingObjects;

class ClueUp extends Employee
{
    public function fire(): void
    {
        echo "{$this->name}: I'll call my lawyer\n";
    }
}
