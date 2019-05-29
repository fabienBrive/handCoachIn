<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatchRepository")
 */
class Match
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=75)
     */
    private $opponent;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $place;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $competition;
}
