<?php

namespace App\Command\Pattern\GeneratingObjects;

use App\Pattern\GeneratingObjects\DependencyInjection\AppointmentMaker;
use App\Pattern\GeneratingObjects\DependencyInjection\ObjectAssembler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DependencyInjection extends Command
{
    protected static $defaultName = 'app:pattern:generate:di';

    protected function configure(): void
    {
        $this->setDescription('DI example.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $assembler = new ObjectAssembler(getenv('CONFIG'));

        /* @var $apptMaker AppointmentMaker */
        $apptMaker = $assembler->toComponent(AppointmentMaker::class);

        echo $apptMaker->makeAppointment();
    }
}
