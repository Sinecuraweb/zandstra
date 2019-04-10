<?php

use App\Command\Object\ClonePerson;
use App\Command\Object\LogProducts;
use App\Command\Object\ReadConfiguration;
use App\Command\Object\WritePerson;
use App\Command\Object\WriteProducts;
use App\Command\Object\WriteProductsFromDB;
use App\Command\ObjectAndDesign\WriteAndReadParams;
use App\Command\Pattern\GeneratingObjects\AbstractFactory;
use App\Command\Pattern\GeneratingObjects\DependencyInjection;
use App\Command\Pattern\GeneratingObjects\Project;
use App\Command\Pattern\GeneratingObjects\Prototype;
use App\Command\Pattern\GeneratingObjects\ServiceLocator;
use App\Command\Pattern\GeneratingObjects\Singleton;
use App\Command\Pattern\Notifier;
use App\Command\Pattern\Strategy;
use Symfony\Component\Console\Application;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/../vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env.local');

$application = new Application();

$application->addCommands([
    new ClonePerson(),
    new LogProducts(),
    new ReadConfiguration(),
    new WritePerson(),
    new WriteProducts(),
    new WriteProductsFromDB(),
    new WriteAndReadParams(),
    new AbstractFactory(),
    new DependencyInjection(),
    new Project(),
    new Prototype(),
    new ServiceLocator(),
    new Singleton(),
    new Notifier(),
    new Strategy()
]);

$application->run();
