<?php

namespace App\Object\Writer;

class TextProductWriter extends ShopProductWriter
{
    /**
     * @return string
     * @throws \RuntimeException
     */
    public function write(): string
    {
        $this->checkProducts();

        $str = "ТОВАРЫ:\n";
        foreach ($this->toProducts() as $product) {
            $str .= sprintf("Идентификатор: %s;\n%s: %s (%s).\nНалог: %s\n\n",
                $product->generateId(),
                $product->toProducer(),
                $product->toTitle(),
                $product->toPrice(),
                $product->calculateTax($product->toPrice())
            );
        }

        return $str;
    }
}
