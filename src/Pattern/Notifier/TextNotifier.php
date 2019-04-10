<?php

namespace App\Pattern\Notifier;

class TextNotifier extends Notifier
{
    /**
     * @param string $message
     */
    public function inform(string $message): void
    {
        echo "Text notification: {$message}\n";
    }
}
