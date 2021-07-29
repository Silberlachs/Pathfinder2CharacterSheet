<?php
declare(strict_types=1);

namespace Pathfinder\Items;


class Weapon extends Item
{
    private string $damage;
    private string $damageType;
    private int $reach;

    public function __construct(string $name, bool $needsAttunement = false)
    {
        if(!$needsAttunement) {
            parent::__construct($name, "weapon");
        }
        else {
            parent::__construct($name, "weapon", $needsAttunement);
        }
    }

    public function setDamage(string $damage)
    {
        $this->damage = $damage;
    }

    public function setReach(int $reach)
    {
        $this->reach = $reach;
    }

    public function setDamageType(string $damageType)
    {
        $this->damageType = $damageType;
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