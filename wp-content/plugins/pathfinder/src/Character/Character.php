<?php

namespace Pathfinder\Character;

use Pathfinder\Character\AbilityScores\AbilityScoreManager;
use Pathfinder\Character\Skills\SkillManager;

class Character
{
    private AbilityScoreManager $abilityScoreManager;
    private SkillManager $skillManager;
    private int $level;

    public function __construct()
    {
        //race: human
        $this->level = 1;
        $this->abilityScoreManager = new AbilityScoreManager(10,10,10,10,10,10);
        $this->skillManager = new SkillManager(__DIR__.'/Skills/skills');
    }

    public function getAbilityScores():array
    {
        return $this->abilityScoreManager->getAbilityScores();
    }

    public function getSkillList():array
    {
        return $this->skillManager->getSkillList();
    }

    public function getProficiencyBonus():int
    {
        return $this->level;
    }
}