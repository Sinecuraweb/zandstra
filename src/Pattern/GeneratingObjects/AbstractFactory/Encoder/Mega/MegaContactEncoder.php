<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Mega;

use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\ContactEncoder;

class MegaContactEncoder extends ContactEncoder
{
    public function encode(): string
    {
        return "Contact data encoded in MegaCal format\n";
    }
}
