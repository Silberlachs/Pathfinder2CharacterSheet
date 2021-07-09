<?php

namespace Pathfinder\Character;

use Pathfinder\Character\AbilityScores\AbilityScoreManager;
use Pathfinder\Character\Resistances\Resistance;
use Pathfinder\Character\Resistances\ResistanceManager;
use Pathfinder\Character\SavingThrows\SavingThrowManager;
use Pathfinder\Character\Skills\SkillManager;

class Character
{
    private AbilityScoreManager $abilityScoreManager;
    private SkillManager $skillManager;
    private SavingThrowManager $savingThrowManager;
    private ResistanceManager $resistanceManager;
    private int $level;
    private string $name;

    public function __construct(string $name)
    {
        $this->level = 1;
        $this->name = $name;
        $this->abilityScoreManager = new AbilityScoreManager(10,10,10,10,10,10);
        $this->skillManager = new SkillManager(__DIR__.'/Skills/skills');
        $this->savingThrowManager = new SavingThrowManager
        (
            $this->abilityScoreManager->getConstitution(),
            $this->abilityScoreManager->getDexterity(),
            $this->abilityScoreManager->getWisdom()
        );
        $this->resistanceManager = new ResistanceManager();
        $this->resistanceManager->addResistance(new Resistance('psychic', 'immunity'));
        $this->resistanceManager->addResistance(new Resistance('test', 'remove in future release'));
        //TODO: add racial and class boni
    }

    public function getAbilityScores():array
    {
        return $this->abilityScoreManager->getAbilityScores();
    }

    public function getSkillList():array
    {
        return $this->skillManager->getSkillList();
    }

    public function getSavingThrowList():array
    {
        return $this->savingThrowManager->getSavingThrows();
    }

    public function getResistances():array
    {
        return $this->resistanceManager->getResistances();
    }

    public function getProficiencyBonus():int
    {
        return $this->level;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getRace():string
    {
        return "testRace";
    }

    public function getClass():string
    {
        return "testClass";
    }
}