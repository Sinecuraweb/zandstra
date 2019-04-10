<?php

namespace App\Pattern\GeneratingObjects\DependencyInjection;

use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\ApptEncoder;

class AppointmentMaker
{
    /**
     * @var ApptEncoder
     */
    private $encoder;

    public function __construct(ApptEncoder $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @return string
     */
    public function makeAppointment(): string
    {
        return $this->encoder->encode();
    }
}
