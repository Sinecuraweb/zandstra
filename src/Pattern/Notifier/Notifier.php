<?php

namespace App\Pattern\Notifier;

abstract class Notifier
{
    /**
     * @return Notifier
     * @throws \Exception
     */
    public static function getNotifier(): Notifier
    {
        return 1 === \random_int(1, 2)
            ? new MailNotifier()
            : new TextNotifier();
    }

    /**
     * @param string $message
     */
    abstract public function inform(string $message): void;
}
