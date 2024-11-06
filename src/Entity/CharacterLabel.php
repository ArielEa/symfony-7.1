<?php

namespace App\Entity;

use App\Repository\CharacterLabelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterLabelRepository::class)]
class CharacterLabel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100, unique: true, nullable: true, options: ['default' => null, 'comment' => '自定义角色的code'])]
    private string $character_label_code;

    #[ORM\Column(type: 'string', length: 100, options: ['default' => null, 'comment' => '人设code'])]
    private string $character_code;

    #[ORM\Column(type: 'string', length: 100, options: ['default' => null, 'comment' => '自定义标签'])]
    private string $custom_label;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $create_time;

    #[ORM\Column(type: 'datetime')]
    private \DateTime $update_time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterLabelCode(): string
    {
        return $this->character_label_code;
    }

    public function setCharacterLabelCode(string $character_label_code): void
    {
        $this->character_label_code = $character_label_code;
    }

    public function getCharacterCode(): string
    {
        return $this->character_code;
    }

    public function setCharacterCode(string $character_code): void
    {
        $this->character_code = $character_code;
    }

    public function getCustomLabel(): string
    {
        return $this->custom_label;
    }

    public function setCustomLabel(string $custom_label): void
    {
        $this->custom_label = $custom_label;
    }

    public function getCreateTime(): \DateTime
    {
        return $this->create_time;
    }

    public function setCreateTime(\DateTime $create_time): void
    {
        $this->create_time = $create_time;
    }

    public function getUpdateTime(): \DateTime
    {
        return $this->update_time;
    }

    public function setUpdateTime(\DateTime $update_time): void
    {
        $this->update_time = $update_time;
    }
}
