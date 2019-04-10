<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Manager;

use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\EncoderInterface;
use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Mega\MegaApptEncoder;
use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Mega\MegaContactEncoder;
use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Mega\MegaTtdEncoder;

class MegaCommsManager extends CommsManager
{
    /**
     * @param int $flag
     * @return EncoderInterface
     */
    public function make(int $flag): EncoderInterface
    {
        switch ($flag) {
            case self::APPT:
                return new MegaApptEncoder();
            case self::CONTACT:
                return new MegaContactEncoder();
            case self::TTD:
                return new MegaTtdEncoder();
        }
    }

    /**
     * @return string
     */
    public function toHeaderText(): string
    {
        return "MegaCal header\n";
    }

    /**
     * @return string
     */
    public function toFooterText(): string
    {
        return "MegaCal footer\n";
    }
}
