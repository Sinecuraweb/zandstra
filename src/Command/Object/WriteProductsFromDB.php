<?php

namespace App\Command\Object;

use App\Object\Entity\Shop\ShopProduct;
use App\Object\Writer\TextProductWriter;
use PDO;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WriteProductsFromDB extends Command
{
    protected static $defaultName = 'app:object:write:products:fromDB';

    protected function configure(): void
    {
        $this->setDescription('Write products from database.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $dsn = getenv('DATABASE_URL');
        $pdo = new PDO($dsn, null, null);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $cd = ShopProduct::createInstance(1, $pdo);
        $book = ShopProduct::createInstance(2, $pdo);

        $textWriter = new TextProductWriter();
        $textWriter->addProduct($cd);
        $textWriter->addProduct($book);

        try {
            echo $textWriter->write();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
