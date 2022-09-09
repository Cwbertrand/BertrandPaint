<?php

namespace App\Tests;

use App\Entity\User;
use PHPUnit\Framework\TestCase;
use Twig\Node\SetNode;

class UserUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setApropos('a propos')
            ->setInstagram('instagram');

        $this->assertTrue($user->getEmail() === 'true@test.com');
        $this->assertTrue($user->getPrenom() === 'prenom');
        $this->assertTrue($user->getnom() === 'nom');
        $this->assertTrue($user->getPassword() === 'password');
        $this->assertTrue($user->getApropos() === 'a propos');
        $this->assertTrue($user->getInstagram() === 'instagram');
        
    }

    public function testIsFalse()
    {
        $user = new User();

        $user->setEmail('true@test.com')
            ->setPrenom('prenom')
            ->setNom('nom')
            ->setPassword('password')
            ->setApropos('a propos')
            ->setInstagram('instagram');

        $this->assertFalse($user->getEmail() === 'false@test.com');
        $this->assertFalse($user->getPrenom() === 'false');
        $this->assertFalse($user->getnom() === 'false');
        $this->assertFalse($user->getPassword() === 'false');
        $this->assertFalse($user->getApropos() === 'false');
        $this->assertFalse($user->getInstagram() === 'false');
        
    }

    public function testIsEmpty()
        {
            $user = new User();
            

            $this->assertEmpty($user->getEmail());
            $this->assertEmpty($user->getPrenom());
            $this->assertEmpty($user->getNom());
            $this->assertEmpty($user->getPassword());
            $this->assertEmpty($user->getApropos());
            $this->assertEmpty($user->getInstagram());
        }
    
}
