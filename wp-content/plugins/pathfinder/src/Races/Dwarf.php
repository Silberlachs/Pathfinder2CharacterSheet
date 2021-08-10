<?php

namespace Pathfinder\Races;

use Pathfinder\Character\AbilityScores\Ability;

class Dwarf implements RaceInterface
{
    private $boni = ['constitution', 'wisdom'];

    public function getBoni(): array
    {
        return $this->boni;
    }

    public function chooseAbilityBonus(string $ability): void
    {
        $this->boni [] = $ability;
    }

    public function getFlaw(): string
    {
        return 'charisma';
    }

    public function getInitialFeats():array
    {

    }

    public function getInitialProficiencies():array
    {

    }

    public function getFeatList(int $level): array
    {
        // TODO: Implement getFeatList() method.
    }
}