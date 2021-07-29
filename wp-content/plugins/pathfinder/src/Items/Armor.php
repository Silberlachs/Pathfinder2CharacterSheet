<?php


namespace Pathfinder\Items;


class Armor extends Item
{
    private string $armorType;
    private int $armorclass;

    public function __construct(string $name, bool $needsAttunement = false)
    {
        if(!$needsAttunement) {
            parent::__construct($name, "armor");
        }
        else {
            parent::__construct($name, "armor", $needsAttunement);
        }
    }

    public function setArmorType(string $armorType)
    {
        $this->armorType = $armorType;
    }

    public function setArmorClass(int $armorClass)
    {
        $this->armorclass = $armorClass;
    }

    public function getArmorType():string
    {
        return $this->armorType;
    }

    public function getArmorClass():int
    {
        return $this->armorclass;
    }
}