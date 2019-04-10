<?php

namespace App\Object\Writer;

class XmlProductWriter extends ShopProductWriter
{
    /**
     * @return string
     * @throws \RuntimeException
     */
    public function write(): string
    {
        $this->checkProducts();

        $writer = new \XMLWriter();
        $writer->openMemory();
        $writer->startDocument('1.0', 'UTF-8');

            $writer->startElement('products');

            foreach ($this->toProducts() as $product) {
                $writer->startElement('product');
                    $writer->writeAttribute('id', $product->generateId());
                    $writer->writeAttribute('title', $product->toTitle());
                    $writer->writeAttribute('price', $product->toPrice());
                    $writer->writeAttribute('tax',
                        $product->calculateTax($product->toPrice()));

                    $writer->startElement('summary');
                        $writer->text($product->toSummaryLine());
                    $writer->endElement();


                $writer->endElement();
            }

            $writer->endElement();

        $writer->endDocument();

        return $writer->flush();
    }
}
