<?php

namespace App\Command\ObjectAndDesign;

use App\ObjectsAndDesign\Handler\ParamHandler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class WriteAndReadParams extends Command
{
    protected static $defaultName = 'app:objectAndDesign:writeAndRead:params';

    protected function configure(): void
    {
        $this->setDescription('Write and read params from files.');
    }

    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ): void {
        $path = __DIR__ . '/../../Config/';

        $pathToText = $path . 'text.txt';

        $writeTextParams = ParamHandler::getInstance($pathToText);
        $writeTextParams->addParam('name', 'bob');
        $writeTextParams->addParam('password', '55');
        $writeTextParams->addParam('email', 'example@example.com');
        $isWriteTextParams = $writeTextParams->write();

        $readTextParams = ParamHandler::getInstance($pathToText);
        $isReadTextParams = $readTextParams->read();

        $textParams = $readTextParams->toAllParams();

        $pathToXml = $path . 'xml.xml';

        $writeXmlParams = ParamHandler::getInstance($pathToXml);
        $writeXmlParams->addParam('name', 'bob');
        $writeXmlParams->addParam('password', '55');
        $writeXmlParams->addParam('email', 'example@example.com');
        $isWriteXmlParams = $writeXmlParams->write();

        $readXmlParams = ParamHandler::getInstance($pathToXml);
        $isReadXmlParams = $readXmlParams->read();

        $xmlParams = $readXmlParams->toAllParams();

        $output->writeln($isWriteTextParams);
        $output->writeln($isReadTextParams);
        $output->writeln($textParams);
        $output->writeln($isWriteXmlParams);
        $output->writeln($isReadXmlParams);
        $output->writeln($xmlParams);
    }
}
