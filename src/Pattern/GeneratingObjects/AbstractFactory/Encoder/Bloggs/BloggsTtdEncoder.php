<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Bloggs;

use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\TtdEncoder;

class BloggsTtdEncoder extends TtdEncoder
{
    public function encode(): string
    {
        return "Things to do data encoded in BloggsCalFormat\n";
    }
}
