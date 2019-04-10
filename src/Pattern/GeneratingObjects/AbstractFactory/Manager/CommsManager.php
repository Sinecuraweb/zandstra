<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Manager;

use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\EncoderInterface;

abstract class CommsManager
{
    public const APPT = 1;
    public const CONTACT = 2;
    public const TTD = 3;

    abstract public function make(int $flag): EncoderInterface;

    /**
     * @return string
     */
    abstract public function toHeaderText(): string;

    /**
     * @return string
     */
    abstract public function toFooterText(): string;
}
