<?php
declare(strict_types=1);

namespace Pathfinder\Character\AbilityScores;

class Ability implements AbilityScoreInterface
{
    private int $score;
    private array $boni = [];

    public function __construct(int $baseValue)
    {
        $this->score = $baseValue;
    }

    private function _calculateModifiers():int
    {
        $retVal = 0;
        foreach ($this->boni as $bonus)
        {
            $retVal += $bonus[1];
        }
        return $retVal;
    }

    public function addModifier(string $name, int $score):void
    {
        $this->boni[] = [$name,$score];
    }

    public function getScore():int
    {
        return $this->score;
    }

    public function getAbilityModifier(): int
    {
        return -5 + round($this->score/2,0,PHP_ROUND_HALF_DOWN) + $this->_calculateModifiers();
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
}