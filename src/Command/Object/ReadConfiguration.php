<?php

namespace App\Command\Object;

use App\Object\Configuration\Conf;
use App\Object\Exception\ConfException;
use App\Object\Exception\FileException;
use App\Object\Exception\XmlException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ReadConfiguration extends Command
{
    protected static $defaultName = 'app:object:read:configuration';

    protected function configure(): void
    {
        $this->setDescription('Reading from and writing to configuration file.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        try {
            $fh = fopen(__DIR__ . '/../../../log/log.txt', 'ab');
            fwrite($fh, "Начало \n");

            $conf = new Conf(__DIR__ . '/../../Config/DB.xml');
            echo $conf->get('user') . "\n";
            echo $conf->get('host') . "\n";
            $conf->set('port', '4242');
            $conf->write();
        } catch (FileException $e) {
            fwrite($fh, "Файловая ошибка\n");
        } catch (XmlException $e) {
            fwrite($fh, "Ошибка в коде xml\n");
        } catch (ConfException $e) {
            fwrite($fh, "Ошибка в файле конфигурации\n");
        } catch (\Exception $e) {
            fwrite($fh, "Другая ошибка\n");
        } finally {
            fwrite($fh, "Конец \n\n");
            fclose($fh);
        }
    }
}
