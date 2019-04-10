<?php

namespace App\PHPUnit\Objects;

class User
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var string
     */
    private $failed;

    /**
     * User constructor.
     * @param string $name
     * @param string $mail
     * @param string $pass
     * @throws \RuntimeException
     */
    public function __construct(string $name, string $mail, string $pass)
    {
        $this->name = $name;
        $this->mail = $mail;

        if (\strlen($pass) < 5) {
            throw new \RuntimeException('Password must have 5 or more letters.');
        }

        $this->pass = $pass;
    }

    public function failed(string $time): void
    {
        $this->failed = $time;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }
}