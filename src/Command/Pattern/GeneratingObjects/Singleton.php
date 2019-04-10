<?php

namespace App\Command\Pattern\GeneratingObjects;

use App\Pattern\GeneratingObjects\Singleton\Preferences;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Singleton extends Command
{
    protected static $defaultName = 'app:pattern:generate:singleton';

    protected function configure(): void
    {
        $this->setDescription('Singleton example.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $pref = Preferences::getInstance();
        $pref->addProperty('name', 'Matt');

        unset($pref);

        $pref2 = Preferences::getInstance();
        $output->writeln($pref2->getProperty('name'));
    }
}
