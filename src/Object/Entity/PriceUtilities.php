<?php

namespace App\Object\Entity;

trait PriceUtilities
{
    /**
     * @param float $price
     * @return float
     */
    public function calculateTax(float $price): float
    {
        return ($this->toTaxRate() / 100) * $price;
    }

    /**
     * @return int
     */
    abstract public function toTaxRate(): int;
}
