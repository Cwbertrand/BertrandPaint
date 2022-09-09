<?php

namespace App\Tests;

use DateTime;
use App\Entity\User;
use App\Entity\Category;
use App\Entity\Peinture;
use PHPUnit\Framework\TestCase;

class PeintureUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $peinture = new Peinture();
        $datetime = new DateTime();
        $category = new Category();
        $user = new User();

        $peinture->setNom('nom')
                ->setLargeur(20.20)
                ->setHauteur(20.20)
                ->setEnvente(true)
                ->setDateRealisation($datetime)
                ->setCreateAt($datetime)
                ->setDescription('description')
                ->setPortfolio(true)
                ->setSlug('slug')
                ->setFile('file')
                ->setCategory($category)
                ->setPrix(20.20)
                ->setUser($user);

        $this->assertTrue($peinture->getNom() === 'nom');
        $this->assertTrue($peinture->getLargeur() == 20.20);
        $this->assertTrue($peinture->getHauteur() == 20.20);
        $this->assertTrue($peinture->getEnvente() === true);
        $this->assertTrue($peinture->getDateRealisation() === $datetime);
        $this->assertTrue($peinture->getCreateAt() === $datetime);
        $this->assertTrue($peinture->getDescription() === 'description');
        $this->assertTrue($peinture->getPortfolio() === true);
        $this->assertTrue($peinture->getSlug() === 'slug');
        $this->assertTrue($peinture->getFile() === 'file');
        $this->assertContains($category, $peinture->getCategory());
        $this->assertTrue($peinture->getPrix() == 20.20);
        $this->assertTrue($peinture->getUser() === $user);

    }


    public function testIsFalse()
    {
        $peinture = new Peinture();
        $datetime = new DateTime();
        $category = new Category();
        $user = new User();

        $peinture->setNom('nom')
                ->setLargeur(20.20)
                ->setHauteur(20.20)
                ->setEnvente(true)
                ->setDateRealisation($datetime)
                ->setCreateAt($datetime)
                ->setDescription('description')
                ->setPortfolio(true)
                ->setSlug('slug')
                ->setFile('file')
                ->setCategory($category)
                ->setPrix(20.20)
                ->setUser($user);

        $this->assertFalse($peinture->getNom() === 'false');
        $this->assertFalse($peinture->getLargeur() == 22.20);
        $this->assertFalse($peinture->getHauteur() == 22.20);
        $this->assertFalse($peinture->getEnvente() === false);
        $this->assertFalse($peinture->getDateRealisation() === new Datetime());
        $this->assertFalse($peinture->getCreateAt() === new DateTime());
        $this->assertFalse($peinture->getDescription() === 'false');
        $this->assertFalse($peinture->getPortfolio() === false);
        $this->assertFalse($peinture->getSlug() === 'false');
        $this->assertFalse($peinture->getFile() === 'false');
        $this->assertNotContains(new Category(), $peinture->getCategory());
        $this->assertFalse($peinture->getPrix() == 22.20);
        $this->assertFalse($peinture->getUser() === new user());


    }

    public function testIsEmpty()
    {
        $peinture = new Peinture();

        $this->assertEmpty($peinture->getNom());
        $this->assertEmpty($peinture->getLargeur());
        $this->assertEmpty($peinture->getHauteur());
        $this->assertEmpty($peinture->getEnvente());
        $this->assertEmpty($peinture->getDateRealisation());
        $this->assertEmpty($peinture->getCreateAt());
        $this->assertEmpty($peinture->getDescription());
        $this->assertEmpty($peinture->getPortfolio());
        $this->assertEmpty($peinture->getSlug());
        $this->assertEmpty($peinture->getFile());
        $this->assertEmpty($peinture->getCategory());
        $this->assertEmpty($peinture->getPrix());
        $this->assertEmpty($peinture->getUser());


    }
}
