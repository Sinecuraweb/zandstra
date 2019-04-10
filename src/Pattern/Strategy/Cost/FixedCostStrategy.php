<?php

namespace App\Pattern\Strategy\Cost;

use App\Pattern\Strategy\Lesson\Lesson;

class FixedCostStrategy extends CostStrategy
{
    /**
     * @param Lesson $lesson
     * @return int
     */
    public function cost(Lesson $lesson): int
    {
        return 30;
    }

    /**
     * @return string
     */
    public function chargeType(): string
    {
        return 'Fixed rate';
    }
}
