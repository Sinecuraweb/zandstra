<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Bloggs;

use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\ContactEncoder;

class BloggsContactEncoder extends ContactEncoder
{
    public function encode(): string
    {
        return "Contact data encoded in BloggsCalFormat\n";
    }
}
