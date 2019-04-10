<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Mega;

use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\ApptEncoder;

class MegaApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded in MegaCal format\n";
    }
}
