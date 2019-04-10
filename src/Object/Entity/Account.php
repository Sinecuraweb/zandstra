<?php

namespace App\Object\Entity;

class Account
{
    /**
     * @var float
     */
    private $balance;

    public function __construct(float $balance)
    {
        $this->balance = $balance;
    }

    public function __clone()
    {
        $this->balance = 0;
    }

    /**
     * @return float
     */
    public function toBalance(): float
    {
        return $this->balance;
    }

    /**
     * @param float $sum
     */
    public function addBalance(float $sum): void
    {
        $this->balance += $sum;
    }
}
// print_r(Account::toBalance($this->balance));