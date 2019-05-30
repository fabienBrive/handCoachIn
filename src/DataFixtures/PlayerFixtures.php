<?php

namespace App\DataFixtures;

use App\Entity\Player;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $player = new Player();

            $player
                ->setFirstName($faker->firstNameMale())
                ->setLastName($faker->lastName())
                ->setNumber($faker->numberBetween($min = 0, $max = 35))
                ->setPosition($faker->numberBetween($min = 1, $max = 7))
                ->setEmail($faker->freeEmail())
                ->setPhoto("todo insertion photo")
                ->setAge($faker->numberBetween($min = 16, $max = 35))
                ->setSeniority($faker->numberBetween($min = 0, $max = 10));

            $manager->persist($player);
        }
        $manager->flush();
    }
}