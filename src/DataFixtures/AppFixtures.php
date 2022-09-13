<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\User;
use App\Entity\Blogpost;
use App\Entity\Category;
use App\Entity\Peinture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        // Utilisation de Faker
        $faker = Factory::create('fr_FR');

        // Creation d'un utilisateur
        $user = new User();

        $user->setEmail('user@test.com')
            ->setPrenom($faker->firstname())
            ->setNom($faker->lastname())
            ->setTelephone($faker->phoneNumber())
            ->setApropos($faker->text())
            ->setInstagram('instagram');

        $password = $this->hasher->hashPassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);
        $manager->flush();


        // Creation de 10 Blogpost
        for ($i=0; $i < 10; $i++) {
            $blogpost = new Blogpost();

            $blogpost->setTitre($faker->words(3, true))
                    ->setCreateAt($faker->dateTimeBetween('-6 month', 'now'))
                    ->setContenu($faker->text(350))
                    ->setSlug($faker->slug('me'))
                    ->setUser($user);

            $manager->persist($blogpost);
        }

        $manager->flush();


        // Creation de 5 Category
        for ($a=0; $a < 5; $a++) {
            $category = new Category();

            $category->setNom($faker->word())
                    ->setDescription($faker->words(10, true))
                    ->setSlug($faker->slug());

            $manager->persist($category);

            //Creation de 2 peinture/Category

            for ($b=0; $b < 2; $b++) {
                $peinture = new Peinture();

                $peinture->setNom($faker->words(3, true))
                        ->setLargeur($faker->randomFloat(2, 20, 60))
                        ->setHauteur($faker->randomFloat(2, 20, 60))
                        ->setEnVente($faker->randomElement([true, false]))
                        ->setDateRealisation($faker->dateTimeBetween('-6 month', 'now'))
                        ->setCreateAt($faker->dateTimeBetween('-6 month', 'now'))
                        ->setDescription($faker->text())
                        ->setPortfolio($faker->randomElement([true, false]))
                        ->setSlug($faker->slug())
                        ->setFile('./img/blog-3.jpg')
                        ->addCategory($category)
                        ->setPrix($faker->randomFloat(2, 100, 9999))
                        ->setUser($user);

                $manager->persist($peinture);
            }
        }

        $manager->flush();
    }
}
