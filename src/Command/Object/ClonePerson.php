<?php

namespace App\Command\Object;

use App\Object\Entity\Person;
use App\Object\Entity\Account;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClonePerson extends Command
{
    protected static $defaultName = 'app:object:clonePerson';

    protected function configure(): void
    {
        $this->setDescription('Copying objects with __clone().');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $bob = new Person('Bob', 44, new Account(200));
        $bobClone = clone $bob;

        $bob->toAccount()->addBalance(100);

        $output->writeln($bob->toId());
        $output->writeln($bobClone->toId());
    }
}
