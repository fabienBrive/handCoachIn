<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use app\Entity\Team;
use Faker\Factory as Faker;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR');
        $repository = $this->getDoctrine()->getRepository(Team::class);
         

        for ($i = 0; $i < 10; $i++) {
            $team = new team();

            // creation aléatoire de donnees grâce à faker
            

            $manager->persist($team);
        }

        $manager->flush();
    }
}