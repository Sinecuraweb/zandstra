<?php

namespace App\Command\Object;

use App\Object\Entity\Shop\BookProduct;
use App\Object\Entity\Shop\CDProduct;
use App\Object\Writer\TextProductWriter;
use App\Object\Writer\XmlProductWriter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WriteProducts extends Command
{
    protected static $defaultName = 'app:object:write:products';

    protected function configure(): void
    {
        $this->setDescription('Write product with format.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $cd = new CDProduct(
            'The Windstar Greatest Hits',
            'Джон',
            'Денвер',
            19.99,
            3.15
        );

        $book = new BookProduct(
            'PHP. Объекты, шаблоны и методики программирования',
            'Мэтт',
            'Зандстра',
            25.89,
            576
        );
        $book->applyDiscount(4.45);


        $textWriter = new TextProductWriter();
        $textWriter->addProduct($cd);
        $textWriter->addProduct($book);

        $writerWithoutProducts = new TextProductWriter();

        $xmlWriter = new XmlProductWriter();
        $xmlWriter->addProduct($cd);
        $xmlWriter->addProduct($book);

        try {
            echo $textWriter->write();
            echo $xmlWriter->write();
            $writerWithoutProducts->write();
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
