<?php

namespace Pathfinder\Character\Skills;

class Skill implements SkillInterface
{
    private SkillLevel $proficiency;
    private string $skillName;
    private string $keyAbility;
    private array $actions;

    public function __construct(string $skillName, string $keyAbility, SkillLevel $skillLevel)
    {
        $this->proficiency = $skillLevel;
        $this->keyAbility = $keyAbility;
        $this->skillName = $skillName;
    }

    public function setProficiency(SkillLevel $proficiency): void
    {
        $this->proficiency = $proficiency;
    }

    public function setActions(array $actions): void
    {
        $this->actions = $actions;
    }

    public function setCustomAction(string $action):void
    {
        $this->actions[] = $action;
    }

    public function getActions(): array
    {
        return $this->actions;
    }

    public function getProficiency(): SkillLevel
    {
        return $this->proficiency;
    }

    public function getKeyAbility(): string
    {
        return $this->keyAbility;
    }

    public function getName():string
    {
        return $this->skillName;
    }

    public function __toString(): string
    {
        return $this->skillName;
    }
}