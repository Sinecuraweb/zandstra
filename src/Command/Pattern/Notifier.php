<?php

namespace App\Command\Pattern;

use App\Pattern\Notifier\RegistrationMgr;
use App\Pattern\Strategy\Cost\FixedCostStrategy;
use App\Pattern\Strategy\Cost\TimedCostStrategy;
use App\Pattern\Strategy\Lesson\Lecture;
use App\Pattern\Strategy\Lesson\Seminar;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Notifier extends Command
{
    protected static $defaultName = 'app:pattern:notifier';

    protected function configure(): void
    {
        $this->setDescription('Notifier example.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $lesson1 = new Seminar(4, new TimedCostStrategy());
        $lesson2 = new Lecture(4, new FixedCostStrategy());

        $mgr = new RegistrationMgr();
        try {
            $mgr->register($lesson1);
            $mgr->register($lesson2);
        } catch (\Exception $e) {
            // ...
        }
    }
}
