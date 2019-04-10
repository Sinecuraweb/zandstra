<?php

namespace App\Command\Object;

use App\Object\Service\Callback\ProcessSale;
use App\Object\Service\Mailer;
use App\Object\Service\Totalizer;
use App\Object\ValueObject\Product;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LogProducts extends Command
{
    protected static $defaultName = 'app:object:logProducts';

    protected function configure(): void
    {
        $this->setDescription('Show callback job.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $logger = function (Product $product) {
            echo sprintf("\tLogging (%s);\n", $product->toName());
        };

        $processor = new ProcessSale();
        $processor->registerCallback($logger);
        $processor->registerCallback([new Mailer(), 'sentMail']);
        $processor->registerCallback(Totalizer::warnAmount(8));

        $processor->sale(new Product('Shoes', 6));
        echo "\n";
        $processor->sale(new Product('Coffee', 5));
    }
}
