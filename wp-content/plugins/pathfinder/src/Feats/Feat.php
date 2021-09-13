<?php

namespace Pathfinder\Feats;

class Feat implements FeatInterface
{
    private string $featName;

    public function __construct(string $featName)
    {
        $this->featName = $featName;
    }

    //FEATS ARE TO BE ADDED VIA A MASK AND NEED TO STAY IN DATABASE!!!!
    public function getFeatName(): string
    {
        return $this->featName;
    }

    public function getAbilityScoreChange(): array
    {
        // TODO: Implement getAbilityScoreChange() method.
    }

    public function getSkillScoreChange(): array
    {
        // TODO: Implement getSkillScoreChange() method.
    }

    public function getSavingThrowChange(): array
    {
        // TODO: Implement getSavingThrowChange() method.
    }

    public function getProficioncyChange(): array
    {
        // TODO: Implement getProficioncyChange() method.
    }

    public function getFeatDescription(): string
    {
        // TODO: Implement getFeatDescription() method.
    }
}