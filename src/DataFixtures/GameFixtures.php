<?php

namespace App\DataFixtures;

use App\Entity\Game;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class GameFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 50; $i++) {
            $game = new game();

            $game
                ->setDate($faker->dateTimeThisYear($max = 'now', $timezone = null))
                ->setOpponent($faker->city())
                ->setScore($faker->numberBetween($min = 18, $max = 35) ." - ". $faker->numberBetween($min = 18, $max = 35))
                ->setCompetition($faker->company());

            $manager->persist($game);
        }
        $manager->flush();
    }
}