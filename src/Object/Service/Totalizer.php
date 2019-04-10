<?php

namespace App\Object\Service;

//use App\Object\ValueObject\Product;

//use App\Object\Service\Callback\ProcessSale;

class Product
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    public function __construct(string $name, float $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function toName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function toPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}


class Totalizer
{
    /**
     * @param $amt
     * @return \Closure
     */
    public static function warnAmount($amt): \Closure
    {
        $count = 0;

        return function (Product $product) use ($amt, &$count) {
            $count += $product->toPrice();

            echo "\tCount: {$count}\n";

            if ($count > $amt) {
                echo sprintf("\nHigh price reached: %s\n", $count);
            }
        };
    }
}

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
$processor -> registerCallback( Totalizer::warnAmount(8) );

$processor->sale(new Product ("Туфли", 6));
print "\n";
$processor->sale (new Product("Кофе", 8));
