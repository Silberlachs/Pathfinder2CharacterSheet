<?php


namespace Pathfinder\Character\AbilityScores;


class Ability implements AbilityScoreInterface
{
    private int $score;
    private array $modifiers = [];

    public function __construct(int $baseValue)
    {
        $this->score = $baseValue;
    }

    private function _calculateModifiers():int
    {
        $retVal = 0;
        foreach ($this->modifiers as $modifier)
        {
            $retVal += $modifier[1];
        }
        return $retVal;
    }

    public function addModifier(string $name, int $score):void
    {
        $this->modifiers[] = [$name,$score];
    }

    public function getScore():int
    {
        return $this->score + $this->_calculateModifiers();
    }

    public function listModifiers(): array
    {
        return $this->modifiers;
    }

    public function removeModifier(string $name): void
    {
        for($i = 0; $i < sizeof($this->modifiers); $i+=1)
        {
            if($this->modifiers[$i][0] === $name)
            {
                unset($this->modifiers[$i]);
                return;
            }
        }
    }
}