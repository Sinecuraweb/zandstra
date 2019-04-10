<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Bloggs;

use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\ApptEncoder;

class BloggsApptEncoder extends ApptEncoder
{
    public function encode(): string
    {
        return "Appointment data encoded in BloggsCalFormat\n";
    }
}
