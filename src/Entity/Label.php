<?php

namespace App\Entity;

use App\Repository\LabelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LabelRepository::class)]
class Label
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100, unique: true, nullable: true, options: ["default" => "", "comment" => "label code"])]
    private string $code;

    #[ORM\Column(type: 'string', length: 100, unique: true, nullable: true, options: ["default" => "", "comment" => "label标签"])]
    private string $label;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $created_time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    public function getCreatedTime(): \DateTime
    {
        return $this->created_time;
    }

    public function setCreatedTime(\DateTime $created_time): void
    {
        $this->created_time = $created_time;
    }
}
