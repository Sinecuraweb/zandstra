<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Encoder;

abstract class TtdEncoder implements EncoderInterface
{
    abstract public function encode(): string;
}
