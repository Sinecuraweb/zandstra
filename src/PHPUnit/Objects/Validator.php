<?php

namespace App\PHPUnit\Objects;

class Validator
{
    /**
     * @var UserStore
     */
    private $store;

    public function __construct(UserStore $store)
    {
        $this->store = $store;
    }

    /**
     * @param string $mail
     * @param string $pass
     * @return bool
     */
    public function validateUser(string $mail, string $pass): bool
    {
        if (!($user = $this->store->getUser($mail)) instanceof User) {
            return false;
        }

        if ($user->getPass() === $pass) {
            return true;
        }

        $this->store->notifyPasswordFailure($mail);

        return false;
    }
}