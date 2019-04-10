<?php

namespace App\Object\Service;

use App\Object\ValueObject\Product;

class Mailer
{
    public function sentMail(Product $product): void
    {
        echo sprintf("\tMailing (%s);\n", $product->toName());
    }
}
