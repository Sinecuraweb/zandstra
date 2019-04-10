<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Encoder;

abstract class ContactEncoder implements EncoderInterface
{
    abstract public function encode(): string;
}
