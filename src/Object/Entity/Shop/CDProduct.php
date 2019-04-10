<?php

namespace App\Object\Entity\Shop;

class CDProduct extends ShopProduct
{
    /**
     * @var int
     */
    private $playLength;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        float $playLength
    ) {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->playLength = $playLength;
    }

    /**
     * @return float
     */
    public function toPlayLength(): float
    {
        return $this->playLength;
    }

    /**
     * @return string
     */
    public function toSummaryLine(): string
    {
        return sprintf('%s: Время звучания - %d',
            parent::toSummaryLine(),
            $this->playLength);
    }

    /**
     * @return int
     */
    public function toTaxRate(): int
    {
        return 25;
    }
}
