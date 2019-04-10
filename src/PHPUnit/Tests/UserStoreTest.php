<?php

namespace App\PHPUnit\Tests;

use App\PHPUnit\Objects\User;
use App\PHPUnit\Objects\UserStore;
use PHPUnit\Framework\TestCase;

class UserStoreTest extends TestCase
{
    /**
     * @var UserStore
     */
    private $store;

    private $name;
    private $mail;
    private $pass;

    protected function setUp(): void
    {
        $this->store = new UserStore();

        $this->name = 'Bob Williams';
        $this->mail = 'a@b.com';
        $this->pass = '12345';
    }

    public function testGetUser(): void
    {
        $this->store->addUser($this->name, $this->mail, $this->pass);
        $user = $this->store->getUser($this->mail);

        $this->assertEquals($user->getMail(), $this->mail);
        $this->assertEquals($user->getName(), $this->name);
        $this->assertEquals($user->getPass(), $this->pass);
    }

    public function testAddUserShortPass(): void
    {
        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage('Password must have 5 or more letters.');
        $this->store->addUser($this->name, $this->mail, 'ff');
        $this->fail('Short password exception expected.');
    }

    public function testAddUserDuplicate(): void
    {
        $name = 'Bob Stevens';

        try {
            $this->store->addUser($this->name, $this->mail, $this->pass);
            $this->store->addUser($name, $this->mail, $this->pass);
            $this->fail('User already in system exception expected.');
        } catch (\Exception $e) {
            $this->assertInstanceOf(\RuntimeException::class, $e);
            $this->assertEquals('User a@b.com already in the system.',
                $e->getMessage());

            $const = $this->logicalAnd(
                $this->logicalNot($this->contains($name)),
                $this->isInstanceOf(User::class)
            );

            $this->assertThat($this->store->getUser($this->mail), $const);
        }
    }
}
