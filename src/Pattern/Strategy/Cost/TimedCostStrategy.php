<?php

namespace App\Pattern\Strategy\Cost;

use App\Pattern\Strategy\Lesson\Lesson;

class TimedCostStrategy extends CostStrategy
{
    /**
     * @param Lesson $lesson
     * @return int
     */
    public function cost(Lesson $lesson): int
    {
        return $lesson->toDuration() * 5;
    }

    /**
     * @return string
     */
    public function chargeType(): string
    {
        return 'Hourly rate';
    }
}
