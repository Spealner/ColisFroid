<?php

namespace App\DataFixtures;

use App\Entity\Colis;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager): void
    {
        // Utilisation de Faker
        $faker = Factory::create('fr_FR');

        // Création d'un utilisateur
        $user = new User();

        $user->setEmail('user@test.com');

        $password = $this->encoder->encodePassword($user, 'password');
        $user->setPassword($password);

        $manager->persist($user);

        // Création de colis
        for ($i=0; $i < 10; $i++) {
            $colis = new Colis();

            $colis->setNombre($faker->randomFloat(2, 10, 100))
                ->setNumber($faker->randomFloat(2, 10, 100))
                ->setLoadinglab($faker->words(3, true))
                ->setDeliverylab($faker->words(3, true));

            $manager->persist($colis);
        }

        $manager->flush();
    }
}
