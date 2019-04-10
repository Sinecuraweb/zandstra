<?php

namespace App\Object\Entity;

class Person
{
    use IdentityTrait;

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $age;

    /**
     * @var Account
     */
    private $account;

    public function __construct(string $name, int $age, Account $account)
    {
        $this->id = $this->generateId();
        $this->name = $name;
        $this->age = $age;
        $this->account = $account;
    }

    public function __clone()
    {
        $this->id = $this->generateId();
        $this->account = clone $this->account;
    }

    /**
     * @return string
     */
    public function toId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function toName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function toAge(): int
    {
        return $this->age;
    }

    /**
     * @return Account
     */
    public function toAccount(): Account
    {
        return $this->account;
    }
}
