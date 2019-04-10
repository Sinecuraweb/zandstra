<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Encoder;

abstract class ApptEncoder implements EncoderInterface
{
    abstract public function encode(): string;
}
