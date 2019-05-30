<?php

namespace App\DataFixtures;

use App\Entity\Coach;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class CoachFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $coach = new coach();
            //first_name	last_name	photo	email
            $coach
                ->setFirstName($faker->firstNameMale())
                ->setLastName($faker->lastName())
                ->setEmail($faker->freeEmail())
                ->setPhoto("to do insertion photo");

            $manager->persist($coach);
        }
        $manager->flush();
    }
}