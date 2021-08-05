<?php
declare(strict_types=1);

namespace Pathfinder\Items;


class Weapon extends Item
{
    private string $damage;
    private string $damageType;
    private array $tags;
    private int $reach;

    public function __construct(string $name, bool $needsAttunement = false)
    {
        if(!$needsAttunement) {
            parent::__construct($name, "weapon");
        }
        else {
            parent::__construct($name, "weapon", $needsAttunement);
        }

        $this->equipable = true;
    }

    public function setDamage(string $damage):void
    {
        $this->damage = $damage;
    }

    public function setReach(int $reach):void
    {
        $this->reach = $reach;
    }

    public function setDamageType(string $damageType):void
    {
        $this->damageType = $damageType;
    }

    public function addTag(string $tag):void
    {
        if(!in_array($tag, $this->tags)){
            $this->tags[] = $tag;
        }
    }

    public function getTags():array
    {
        return $this->tags;
    }

    public function getDamage():string
    {
        return $this->damage;
    }

    public function getDamageType():string
    {
        return $this->damageType;
    }

    public function getReach(): int
    {
        return $this->reach;
    }

}