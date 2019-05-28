<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use app\Entity\Team;
use app\Entity\Coach;
use Faker\Factory as Faker;

class CoachFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR');
        $repository = $this->getDoctrine()->getRepository(Team::class);
         

        for ($i = 0; $i < 10; $i++) {
            $coach = new coach();

            $team = $repository->find($i);
            var_dump($team);

            // creation aléatoire de donnees grâce à faker
            $coach
                ->setFirstname($faker->firstNameMale())
                ->setLastname($faker->lastName())
                ->setMail($faker->email())
                ->setTeam($team);

            $manager->persist($coach);
        }

        $manager->flush();
    }
}