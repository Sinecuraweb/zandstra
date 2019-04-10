<?php

namespace App\Command\Pattern\GeneratingObjects;

use App\Pattern\GeneratingObjects\Prototype\Resource\Sea\OilResource;
use App\Pattern\GeneratingObjects\Prototype\Terrain\Forest\EarthForest;
use App\Pattern\GeneratingObjects\Prototype\Terrain\Plains\MarsPlains;
use App\Pattern\GeneratingObjects\Prototype\Terrain\Sea\EarthSea;
use App\Pattern\GeneratingObjects\Prototype\Terrain\TerrainFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Prototype extends Command
{
    protected static $defaultName = 'app:pattern:generate:prototype';

    protected function configure(): void
    {
        $this->setDescription('Prototype example.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $factory = new TerrainFactory(
            new EarthForest(),
            new MarsPlains(),
            new EarthSea(-1, new OilResource(200))
        );

        $sea = $factory->toSea();
        $sea->toResource()->extraction(50);
    }
}
