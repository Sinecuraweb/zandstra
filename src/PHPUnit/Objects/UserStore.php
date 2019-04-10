<?php

namespace App\PHPUnit\Objects;

class UserStore
{
    /**
     * @var User[]
     */
    private $users = [];

    /**
     * @param string $name
     * @param string $mail
     * @param string $pass
     * @return bool
     * @throws \RuntimeException
     */
    public function addUser(string $name, string $mail, string $pass): bool
    {
        if (isset($this->users[$mail])) {
            throw new \RuntimeException("User {$mail} already in the system.");
        }

        if (\strlen($pass) < 5) {
            throw new \RuntimeException('Password must have 5 or more letters.');
        }

        $this->users[$mail] = new User($name, $mail, $pass);

        return true;
    }

    /**
     * @param string $mail
     */
    public function notifyPasswordFailure(string $mail): void
    {
        if (isset($this->users[$mail])) {
            $this->users[$mail]->failed(time());
        }
    }

    /**
     * @param string $mail
     * @return User|null
     */
    public function getUser(string $mail): ?User
    {
        return $this->users[$mail] ?? null;
    }
}