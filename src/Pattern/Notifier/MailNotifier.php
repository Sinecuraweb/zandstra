<?php

namespace App\Pattern\Notifier;

class MailNotifier extends Notifier
{
    /**
     * @param string $message
     */
    public function inform(string $message): void
    {
        echo "Mail notification: {$message}\n";
    }
}
