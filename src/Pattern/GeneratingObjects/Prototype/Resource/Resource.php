<?php

namespace App\Pattern\GeneratingObjects\Prototype\Resource;

class Resource
{
    /**
     * @var int
     */
    private $quantity;

    public function __construct(int $quantity = 100)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param int $quantity
     */
    public function extraction(int $quantity): void
    {
        $this->quantity -= $quantity;
    }

    /**
     * @return int
     */
    public function toQuantity(): int
    {
        return $this->quantity;
    }
}
