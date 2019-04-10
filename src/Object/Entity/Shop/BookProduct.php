<?php

namespace App\Object\Entity\Shop;

class BookProduct extends ShopProduct
{
    /**
     * @var int
     */
    private $numPages;

    public function __construct(
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPages
    ) {
        parent::__construct($title, $firstName, $mainName, $price);
        $this->numPages = $numPages;
    }

    /**
     * @return int
     */
    public function toNumPages(): int
    {
        return $this->numPages;
    }

    /**
     * @return string
     */
    public function toSummaryLine(): string
    {
        return sprintf('%s: %d стр.',
            parent::toSummaryLine(),
            $this->numPages);
    }

    /**
     * @return float
     */
    public function toPrice(): float
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function toTaxRate(): int
    {
        return 30;
    }
}
