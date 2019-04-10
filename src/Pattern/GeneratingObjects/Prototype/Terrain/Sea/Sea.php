<?php

namespace App\Pattern\GeneratingObjects\Prototype\Terrain\Sea;

use App\Pattern\GeneratingObjects\Prototype\Resource\Resource;
use App\Pattern\GeneratingObjects\Prototype\Resource\Sea\FishResource;

class Sea
{
    /**
     * @var int
     */
    private $navigability;

    /**
     * @var Resource
     */
    private $resource;

    public function __construct(int $navigability, Resource $resource = null)
    {
        $this->navigability = $navigability;
        $this->resource = $resource ?? new FishResource();
    }

    /**
     * @return int
     */
    public function toNavigability(): int
    {
        return $this->navigability;
    }

    /**
     * @return Resource
     */
    public function toResource(): Resource
    {
        return $this->resource;
    }

    public function __clone()
    {
        $this->resource = clone $this->resource;
    }
}
