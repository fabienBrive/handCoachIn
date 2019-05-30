<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $team1 = new team();

        $team1
            ->setCategory("+16ans")
            ->setStatus("première");

        $manager->persist($team1);

        $team2 = new team();

        $team2
            ->setCategory("+16ans")
            ->setStatus("résèrve");

        $manager->persist($team2);

        
        $team3 = new team();

        $team3
            ->setCategory("+15ans")
            ->setStatus("entente");

        $manager->persist($team3);


        $manager->flush();
    }
}