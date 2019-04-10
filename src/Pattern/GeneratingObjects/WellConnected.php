<?php

namespace App\Pattern\GeneratingObjects;

class WellConnected extends Employee
{
    public function fire(): void
    {
        echo "{$this->name}: I'll call my dad\n";
    }
}
