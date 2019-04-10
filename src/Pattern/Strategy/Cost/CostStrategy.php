<?php

namespace App\Pattern\Strategy\Cost;

use App\Pattern\Strategy\Lesson\Lesson;

abstract class CostStrategy
{
    /**
     * @param Lesson $lesson
     * @return int
     */
    abstract public function cost(Lesson $lesson): int;

    /**
     * @return string
     */
    abstract public function chargeType(): string;
}
