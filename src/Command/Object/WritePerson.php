<?php

namespace App\Command\Object;

use App\Object\ValueObject\Person;
use App\Object\Writer\PersonWriter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WritePerson extends Command
{
    protected static $defaultName = 'app:object:write:person';

    protected function configure(): void
    {
        $this->setDescription('Write person data to log file.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        (new Person('Bob', 42))->output(
            new class (__DIR__ . '/../../../log/PersonLog.txt') implements PersonWriter
            {
                /**
                 * @var string
                 */
                private $path;

                public function __construct(string $path)
                {
                    $this->path = $path;
                }

                /**
                 * @param Person $person
                 */
                public function write(Person $person): void
                {
                    file_put_contents($this->path, sprintf(
                        "%s %s\n",
                        $person->toName(),
                        $person->toAge()
                    ));
                }
            }
        );
    }
}
