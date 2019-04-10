<?php

namespace App\Object\Writer;

use App\Object\Entity\Shop\ShopProduct;

abstract class ShopProductWriter
{
    /**
     * @var ShopProduct[]
     */
    private $products = [];

    /**
     * @return string
     */
    abstract public function write(): string;

    /**
     * @param ShopProduct $product
     */
    public function addProduct(ShopProduct $product): void
    {
        $this->products[] = $product;
    }

    /**
     * @return ShopProduct[]
     */
    public function toProducts(): array
    {
        return $this->products;
    }

    /**
     * @throws \RuntimeException
     */
    public function checkProducts(): void
    {
        if ([] === $this->toProducts()) {
            throw new \RuntimeException("Нет добавленных продуктов.\n");
        }
    }
}
