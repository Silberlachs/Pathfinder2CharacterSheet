<?php

namespace Pathfinder\Races\Dwarf;

use Pathfinder\Character\AbilityScores\Ability;
use Pathfinder\Feats\Feat;
use Pathfinder\Races\RaceInterface;

class Dwarf implements RaceInterface
{
    private $boni = ['constitution', 'wisdom'];
    private $initialFeat;

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

    public function setInitialFeat(Feat $initialFeat):void
    {
        $this->initialFeat = $initialFeat;
    }

    public function getInitialFeat(): Feat
    {
        return $this->initialFeat;
    }

    public function getFeatList(int $level): array
    {
        return [];
    }
}