<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Mega;

use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\TtdEncoder;

class MegaTtdEncoder extends TtdEncoder
{
    public function encode(): string
    {
        return "Things to do data encoded in MegaCal format\n";
    }
}
