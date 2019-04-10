<?php

namespace App\Object\Service\Callback;

use App\Object\ValueObject\Product;

class ProcessSale
{
    /**
     * @var callable[]
     */
    private $callbacks = [];

    /**
     * @param callable $callback
     */
    public function registerCallback(callable $callback): void
    {
        $this->callbacks[] = $callback;
    }

    /**
     * @param Product $product
     */
    public function sale(Product $product): void
    {
        echo sprintf("%s: processing \n", $product->toName());

        foreach ($this->callbacks as $callback) {
            $callback($product);
        }
    }
}

$processor = new ProcessSale();
//$processor -> registerCallback( Totalizer::warnAmount(8) );
// echo "123";


print_r($product);