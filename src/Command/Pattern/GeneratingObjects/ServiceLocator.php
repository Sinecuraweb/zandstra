<?php

namespace App\Command\Pattern\GeneratingObjects;

use App\Pattern\GeneratingObjects\ServiceLocator\AppConfig;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ServiceLocator extends Command
{
    protected static $defaultName = 'app:pattern:generate:prototype';

    protected function configure(): void
    {
        $this->setDescription('Service locator example.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $commsMgr = AppConfig::getInstance()->getCommsManager();
        $output->writeln($commsMgr->toHeaderText());
        $output->writeln($commsMgr->toFooterText());
    }
}
