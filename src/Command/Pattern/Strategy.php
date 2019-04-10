<?php

namespace App\Command\Pattern;

use App\Pattern\Strategy\Cost\FixedCostStrategy;
use App\Pattern\Strategy\Cost\TimedCostStrategy;
use App\Pattern\Strategy\Lesson\Lecture;
use App\Pattern\Strategy\Lesson\Lesson;
use App\Pattern\Strategy\Lesson\Seminar;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Strategy extends Command
{
    protected static $defaultName = 'app:pattern:strategy';

    protected function configure(): void
    {
        $this->setDescription('Strategy example.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $lessons[] = new Seminar(4, new TimedCostStrategy());
        $lessons[] = new Lecture(4, new FixedCostStrategy());

        /* @var $lesson Lesson */
        foreach ($lessons as $lesson) {
            $output->writeln(sprintf(
                "Lesson charge %s. Charge type: %s.\n",
                $lesson->cost(),
                $lesson->chargeType()
            ));
        }
    }
}
