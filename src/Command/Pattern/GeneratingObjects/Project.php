<?php

namespace App\Command\Pattern\GeneratingObjects;

use App\Pattern\GeneratingObjects\Employee;
use App\Pattern\GeneratingObjects\NastyBoss;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Project extends Command
{
    protected static $defaultName = 'app:pattern:generate:project';

    protected function configure(): void
    {
        $this->setDescription('Project example.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $boss = new NastyBoss();
        $boss->addEmployee(Employee::recruit('Harry'));
        $boss->addEmployee(Employee::recruit('Bob'));
        $boss->addEmployee(Employee::recruit('Mary'));
        $boss->projectFails();
        $boss->projectFails();
        $boss->projectFails();
    }
}


