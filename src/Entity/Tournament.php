<?php

namespace App\Entity;

use App\Repository\TournamentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TournamentRepository::class)]
class Tournament
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $tournoiName;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'date')]
    private $date;

    #[ORM\Column(type: 'boolean')]
    private $ranked;

    #[ORM\Column(type: 'integer')]
    private $eloMin;

    #[ORM\Column(type: 'integer')]
    private $eloMax;

    #[ORM\Column(type: 'string', length: 255)]
    private $gender;

    #[ORM\Column(type: 'integer')]
    private $round;

    #[ORM\Column(type: 'integer')]
    private $playerMin;

    #[ORM\Column(type: 'integer')]
    private $playerMax;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTournoiName(): ?string
    {
        return $this->tournoiName;
    }

    public function setTournoiName(string $tournoiName): self
    {
        $this->tournoiName = $tournoiName;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getRanked(): ?bool
    {
        return $this->ranked;
    }

    public function setRanked(bool $ranked): self
    {
        $this->ranked = $ranked;

        return $this;
    }

    public function getEloMin(): ?int
    {
        return $this->eloMin;
    }

    public function setEloMin(int $eloMin): self
    {
        $this->eloMin = $eloMin;

        return $this;
    }

    public function getEloMax(): ?int
    {
        return $this->eloMax;
    }

    public function setEloMax(int $eloMax): self
    {
        $this->eloMax = $eloMax;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getRound(): ?int
    {
        return $this->round;
    }

    public function setRound(int $round): self
    {
        $this->round = $round;

        return $this;
    }

    public function getPlayerMin(): ?int
    {
        return $this->playerMin;
    }

    public function setPlayerMin(int $playerMin): self
    {
        $this->playerMin = $playerMin;

        return $this;
    }

    public function getPlayerMax(): ?int
    {
        return $this->playerMax;
    }

    public function setPlayerMax(int $playerMax): self
    {
        $this->playerMax = $playerMax;

        return $this;
    }
}
