<?php

namespace Pathfinder\Spells;

class Spell
{
    private string $name;
    private string $school;
    private string $description;
    private string $cost;
    private string $damageOrSave;
    private string $effect;
    private string $areaOfEffect;
    private array $components;
    private int $level;
    private int $castingTime;

    public function __construct(string $name, string $school, int $level)
    {
        $this->name = $name;
        $this->school = $school;
        $this->level = $level;
    }

    public function setDescription(string $description):void
    {
        $this->description = htmlentities($description);
    }

    public function setCost(string $cost):void
    {
        $this->cost = htmlentities($cost);
    }

    public function setComponents(array $components):void
    {
        $this->components = $components;
    }

    public function setDamageOrSave(string $dmgOrsave):void
    {
        $this->damageOrSave = $dmgOrsave;
    }

    public function setEffect(string $effect):void
    {
        $this->effect = $effect;
    }

    public function setAreaOfEffect(string $areaOfEffect):void
    {
        $this->areaOfEffect = $areaOfEffect;
    }

    public function setCastingTime(int $castingTime):void
    {
        $this->castingTime = $castingTime;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getSchool():string
    {
        return $this->school;
    }

    public function getDescription():string
    {
        return $this->description;
    }

    public function getCost():string
    {
        return $this->cost;
    }

    public function getDamageOrSave():string
    {
        return $this->damageOrSave;
    }

    public function getEffect():string
    {
        return $this->effect;
    }

    public function getAreaOfEffect():string
    {
        return $this->areaOfEffect;
    }

    public function getComponentes():array
    {
        return $this->components;
    }

    public function getLevel():int
    {
        return $this->level;
    }

    public function getCastingTime():int
    {
        return $this->castingTime;
    }
}