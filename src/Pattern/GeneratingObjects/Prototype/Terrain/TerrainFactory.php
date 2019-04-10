<?php

namespace App\Pattern\GeneratingObjects\Prototype\Terrain;

use App\Pattern\GeneratingObjects\Prototype\Terrain\Forest\Forest;
use App\Pattern\GeneratingObjects\Prototype\Terrain\Plains\Plains;
use App\Pattern\GeneratingObjects\Prototype\Terrain\Sea\Sea;

class TerrainFactory
{
    /**
     * @var Forest
     */
    private $forest;

    /**
     * @var Plains
     */
    private $plains;

    /**
     * @var Sea
     */
    private $sea;

    public function __construct(Forest $forest, Plains $plains, Sea $sea)
    {
        $this->forest = $forest;
        $this->plains = $plains;
        $this->sea = $sea;
    }

    /**
     * @return Forest
     */
    public function toForest(): Forest
    {
        return clone $this->forest;
    }

    /**
     * @return Plains
     */
    public function toPlains(): Plains
    {
        return clone $this->plains;
    }

    /**
     * @return Sea
     */
    public function toSea(): Sea
    {
        return clone $this->sea;
    }
}
