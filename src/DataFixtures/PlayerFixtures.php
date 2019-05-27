<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use app\Entity\Player;
use Faker\Factory as Faker;

class PlayerFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker::create('fr_FR');

        for ($i = 0; $i < 25; $i++) {
            $player = new Player();

            // creation aléatoire de donnees grâce à faker
            $player
                ->setFirstname($faker->firstNameMale())
                ->setLastname($faker->lastName())
                ->setNumber($faker->numberBetween($min = 1, $max = 53))
                ->setBirthdate($faker->dateTime($max = 'now', $timezone = null))
                ->setSeniority($faker->numberBetween($min = 0, $max = 10))
                ->setPosition($faker->jobtitle())
                ->setMail($faker->email());

            // Calcule de lâge du player
            $birthDate = $player->getBirthdate()->format('d-m-Y');

            $birthDate = explode("-", $birthDate);

            $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                ? ((date("Y") - $birthDate[2]) - 1)
                : (date("Y") - $birthDate[2]));

            $player->setAge($age);
                
            $manager->persist($player);
        }


        $manager->flush();
    }
}