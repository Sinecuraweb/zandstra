<?php

namespace App\Pattern\Notifier;

use App\Pattern\Strategy\Lesson\Lesson;

class RegistrationMgr
{
    /**
     * @param Lesson $lesson
     * @throws \Exception
     */
    public function register(Lesson $lesson): void
    {
        // Do some with this lesson
        // Now tell someone
        Notifier::getNotifier()->inform("new lesson: cost ({$lesson->cost()})");
    }
}
