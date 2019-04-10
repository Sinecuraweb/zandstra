<?php

namespace App\Object\Entity;

interface IdentityObject
{
    /**
     * @return string
     */
    public function generateId(): string;
}
