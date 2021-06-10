<?php

namespace Pathfinder\Character\Skills;

interface SkillInterface
{
    public function __construct(string $skillName, string $keyAbility, SkillLevel $proficiency);
    public function setActions(array $actions):void;
    public function setProficiency(SkillLevel $proficiency): void;
    public function getProficiency():SkillLevel;
    public function __toString(): string;
}