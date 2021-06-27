<?php

namespace Pathfinder\Character\SavingThrows;

use Pathfinder\Character\AbilityScores\Ability;

class SavingThrow implements SavingThrowInterface
{
    private Ability $baseAbilityScore;
    private string $name;
    private SaveProficiency $saveProficiency;
    private array $boni = [];

    public function __construct(string $name, Ability $baseAbilityScore, SaveProficiency $saveProficiency)
    {
        $this->baseAbilityScore = $baseAbilityScore;
        $this->saveProficiency = $saveProficiency;
        $this->name = $name;
    }

    private function _calculateBoni():int
    {
        $retVal = 0;
        foreach ($this->boni as $bonus)
        {
            $retVal += $bonus[1];
        }
        return $retVal;
    }

    public function addModifier(string $name, int $modifier): void
    {
        $this->boni [] = [$name, $modifier];
    }

    public function listModifiers(): array
    {
        return $this->boni;
    }

    public function removeModifier(string $name): void
    {
        for($i = 0; $i < sizeof($this->boni); $i+=1)
        {
            if($this->boni[$i][0] === $name)
            {
                unset($this->boni[$i]);
                return;
            }
        }
    }

    public function getSavingThrowModifier(): int
    {
        $bonus = $this->_calculateBoni();
        return $this->baseAbilityScore->getAbilityModifier() + $this->saveProficiency->getSkillLevelBonus() +$bonus;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getProficiency():SaveProficiency
    {
        return $this->saveProficiency;
    }
}