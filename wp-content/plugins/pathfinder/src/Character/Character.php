<?php

namespace Pathfinder\Character;

use Pathfinder\Character\AbilityScores\AbilityScoreManager;
use Pathfinder\Character\Feats\FeatManager;
use Pathfinder\Character\Inventory\InventoryManager;
use Pathfinder\Character\Proficiencies\ProficiencyManager;
use Pathfinder\Character\Resistances\ResistanceManager;
use Pathfinder\Character\SavingThrows\SavingThrowManager;
use Pathfinder\Character\Skills\SkillManager;
use Pathfinder\Races\RaceInterface;

class Character
{
    private AbilityScoreManager $abilityScoreManager;
    private SkillManager $skillManager;
    private SavingThrowManager $savingThrowManager;
    private ResistanceManager $resistanceManager;
    private ProficiencyManager $proficiencyManager;
    private InventoryManager $inventory;
    private FeatManager $featManager;
    private RaceInterface $race;
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
        $this->proficiencyManager = new ProficiencyManager();
        $this->featManager = new FeatManager();
        $this->inventory = new InventoryManager();
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

    public function getInventory():array
    {
        return $this->inventory->getInventory();
    }

    public function getEquippedItems():array
    {
        return $this->inventory->getEquippedItems();
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

    public function getRace():RaceInterface
    {
        return $this->race;
    }

    public function getClass():string
    {
        return "testClass";
    }

    public function getFeats():FeatManager
    {
        return $this->featManager;
    }

    public function getProficiencies():ProficiencyManager
    {
        return $this->proficiencyManager;
    }
}