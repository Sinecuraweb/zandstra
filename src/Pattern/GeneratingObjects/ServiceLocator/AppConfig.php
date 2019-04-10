<?php

namespace App\Pattern\GeneratingObjects\ServiceLocator;

use App\Pattern\GeneratingObjects\AbstractFactory\Manager\CommsManager;
use App\Pattern\GeneratingObjects\AbstractFactory\Manager\BloggsCommsManager;
use App\Pattern\GeneratingObjects\AbstractFactory\Manager\MegaCommsManager;

class AppConfig
{
    /**
     * @var self
     */
    private static $instance;

    /**
     * @var CommsManager
     */
    private $commsManager;

    public function __construct()
    {
        $this->init();
    }

    private function init(): void
    {
        if ('Mega' === getenv('COMMSTYPE')) {
            $this->commsManager = new MegaCommsManager();
        } else {
            $this->commsManager = new BloggsCommsManager();
        }
    }

    /**
     * @return self
     */
    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @return CommsManager
     */
    public function getCommsManager(): CommsManager
    {
        return $this->commsManager;
    }
}
