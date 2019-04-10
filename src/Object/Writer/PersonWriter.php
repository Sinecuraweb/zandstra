<?php

namespace App\Object\Writer;

use App\Object\ValueObject\Person;

interface PersonWriter
{
    public function write(Person $person): void;
}
