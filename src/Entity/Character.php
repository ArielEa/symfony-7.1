<?php

namespace App\Entity;

use App\Repository\CharacterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CharacterRepository::class)]
#[ORM\Table(name: '`character`')]
class Character
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100, options: ['default' => '', 'comment' => "user code"])]
    private string $user_code;

    #[ORM\Column(type: 'string', length: 100, unique: true, options: ['default' => '', 'comment' => "character code"])]
    private string $character_code;

    #[ORM\Column(type: 'integer', length: 2, options: ['default' => 0, 'comment' => "0 common user, 1 administer, 2 forbidden user"])]
    private int $attribute;

    #[ORM\Column(type: 'string', length: 100, options: ['default' => '', 'comment' => "character name"])]
    private string $character_name;

    #[ORM\Column(type: 'string', length: 100, options: ['default' => '', 'comment' => "male  or female"])]
    private string $character_sexy;

    #[ORM\Column(type: 'string', length: 100, nullable: true, options: ['default' => '', 'comment' => "label code, use # to distinguish its tapes."])]
    private string $character_label;

    #[ORM\Column(type: 'integer', length: 2, options: ['default' => 0, 'comment' => "0 not use , 1 in use"])]
    private int $is_used;

    #[ORM\Column(type: 'datetime', options: ['default' => null, 'comment' => "create time"])]
    private \DateTime $create_time;

    #[ORM\Column(type: 'datetime', options: ['default' => null, 'comment' => "update time"])]
    private \DateTime $update_time;

    #[ORM\Column(type: 'datetime', options: ['default' => null, 'comment' => "register time, 角色正式启用的时间"])]
    private \DateTime $register_time;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserCode(): string
    {
        return $this->user_code;
    }

    public function setUserCode(string $user_code): void
    {
        $this->user_code = $user_code;
    }

    public function getAttribute(): int
    {
        return $this->attribute;
    }

    public function setAttribute(int $attribute): void
    {
        $this->attribute = $attribute;
    }

    public function getCharacterName(): string
    {
        return $this->character_name;
    }

    public function setCharacterName(string $character_name): void
    {
        $this->character_name = $character_name;
    }

    public function getCharacterSexy(): string
    {
        return $this->character_sexy;
    }

    public function setCharacterSexy(string $character_sexy): void
    {
        $this->character_sexy = $character_sexy;
    }

    public function getCharacterLabel(): string
    {
        return $this->character_label;
    }

    public function setCharacterLabel(string $character_label): void
    {
        $this->character_label = $character_label;
    }

    public function getIsUsed(): int
    {
        return $this->is_used;
    }

    public function setIsUsed(int $is_used): void
    {
        $this->is_used = $is_used;
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

    public function getRegisterTime(): \DateTime
    {
        return $this->register_time;
    }

    public function setRegisterTime(\DateTime $register_time): void
    {
        $this->register_time = $register_time;
    }
}
