<?php

namespace App\Entity;

use App\Repository\ConferenceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConferenceRepository::class)]
class Conference
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $conferenceName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConferenceName(): string
    {
        return $this->conferenceName;
    }

    public function setConferenceName(string $conferenceName): void
    {
        $this->conferenceName = $conferenceName;
    }
}
