<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\player", mappedBy="matchlist")
     */
    private $playerlist;

    public function __construct()
    {
        $this->playerlist = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOpponent(): ?string
    {
        return $this->opponent;
    }

    public function setOpponent(string $opponent): self
    {
        $this->opponent = $opponent;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getCompetition(): ?string
    {
        return $this->competition;
    }

    public function setCompetition(?string $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * @return Collection|player[]
     */
    public function getPlayerlist(): Collection
    {
        return $this->playerlist;
    }

    public function addPlayerlist(player $playerlist): self
    {
        if (!$this->playerlist->contains($playerlist)) {
            $this->playerlist[] = $playerlist;
            $playerlist->setMatchlist($this);
        }

        return $this;
    }

    public function removePlayerlist(player $playerlist): self
    {
        if ($this->playerlist->contains($playerlist)) {
            $this->playerlist->removeElement($playerlist);
            // set the owning side to null (unless already changed)
            if ($playerlist->getMatchlist() === $this) {
                $playerlist->setMatchlist(null);
            }
        }

        return $this;
    }
}
