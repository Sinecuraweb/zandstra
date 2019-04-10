<?php

namespace App\PHPUnit\Tests;

use App\PHPUnit\Objects\User;
use App\PHPUnit\Objects\UserStore;
use App\PHPUnit\Objects\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    /**
     * @var Validator
     */
    private $validator;

    private $name;
    private $mail;
    private $pass;

    protected function setUp(): void
    {
        $this->name = 'Bob Williams';
        $this->mail = 'a@b.com';
        $this->pass = '12345';

        $store = new UserStore();
        $store->addUser($this->name, $this->mail, $this->pass);
        $this->validator = new Validator($store);
    }

    public function testValidateCorrectPass(): void
    {
        $this->assertTrue(
            $this->validator->validateUser($this->mail, $this->pass),
            'Expected successful validation.'
        );
    }

    /**
     * @throws \ReflectionException
     */
    public function testValidateFalsePass(): void
    {
        $store = $this->createMock(UserStore::class);
        $this->validator = new Validator($store);

        $store->expects($this->once())
            ->method('notifyPasswordFailure')
            ->with($this->mail);

        $store->expects($this->any())
            ->method('getUser')
            ->will($this->returnValue(
                new User($this->name, $this->mail, $this->pass))
            );

        $this->validator->validateUser($this->mail, 'wrong');
    }
}
