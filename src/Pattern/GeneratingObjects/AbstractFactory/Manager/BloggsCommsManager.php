<?php

namespace App\Pattern\GeneratingObjects\AbstractFactory\Manager;

use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\EncoderInterface;
use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Bloggs\BloggsApptEncoder;
use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Bloggs\BloggsContactEncoder;
use App\Pattern\GeneratingObjects\AbstractFactory\Encoder\Bloggs\BloggsTtdEncoder;

class BloggsCommsManager extends CommsManager
{
    /**
     * @param int $flag
     * @return EncoderInterface
     */
    public function make(int $flag): EncoderInterface
    {
        switch ($flag) {
            case self::APPT:
                return new BloggsApptEncoder();
            case self::CONTACT:
                return new BloggsContactEncoder();
            case self::TTD:
                return new BloggsTtdEncoder();
        }
    }

    /**
     * @return string
     */
    public function toHeaderText(): string
    {
        return "BloggsCal header\n";
    }

    /**
     * @return string
     */
    public function toFooterText(): string
    {
        return "BloggsCal footer\n";
    }
}
