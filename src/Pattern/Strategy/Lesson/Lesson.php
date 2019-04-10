<?php

namespace App\Pattern\Strategy\Lesson;

use App\Pattern\Strategy\Cost\CostStrategy;

abstract class Lesson
{
    /**
     * @var int
     */
    private $duration;
    /**
     * @var CostStrategy
     */
    private $costStrategy;

    /**
     * Lesson constructor.
     * @param int $duration
     * @param CostStrategy $strategy
     */
    public function __construct(int $duration, CostStrategy $strategy)
    {
        $this->duration = $duration;
        $this->costStrategy = $strategy;
    }

    /**
     * @return int
     */
    public function cost(): int
    {
        return $this->costStrategy->cost($this);
    }

    /**
     * @return string
     */
    public function chargeType(): string
    {
        return $this->costStrategy->chargeType();
    }

    /**
     * @return int
     */
    public function toDuration(): int
    {
        return $this->duration;
    }
}
