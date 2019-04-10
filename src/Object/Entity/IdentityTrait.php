<?php

namespace App\Object\Entity;

trait IdentityTrait
{
    /**
     * @return string
     */
    public function generateId(): string
    {
        return uniqid('', true);
    }
}
