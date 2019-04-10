<?php

namespace App\Command\Pattern\GeneratingObjects;

use App\Pattern\GeneratingObjects\AbstractFactory\Manager\BloggsCommsManager;
use App\Pattern\GeneratingObjects\AbstractFactory\Manager\MegaCommsManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AbstractFactory extends Command
{
    protected static $defaultName = 'app:pattern:generate:abstractFactory';

    protected function configure(): void
    {
        $this->setDescription('Abstract factory example.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $mrg = new BloggsCommsManager();
        echo $mrg->toHeaderText(),
        $mrg->make(BloggsCommsManager::APPT)->encode(),
        $mrg->make(BloggsCommsManager::CONTACT)->encode(),
        $mrg->make(BloggsCommsManager::TTD)->encode(),
        $mrg->toFooterText();

        echo "\n";

        $mrg = new MegaCommsManager();
        echo $mrg->toHeaderText(),
        $mrg->make(BloggsCommsManager::APPT)->encode(),
        $mrg->make(BloggsCommsManager::CONTACT)->encode(),
        $mrg->make(BloggsCommsManager::TTD)->encode(),
        $mrg->toFooterText();
    }
}
