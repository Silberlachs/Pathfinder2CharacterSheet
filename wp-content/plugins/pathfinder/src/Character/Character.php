<?php

namespace Pathfinder\Character;

use Pathfinder\Character\AbilityScores\AbilityScoreManager;
use Pathfinder\Character\Inventory\InventoryManager;
use Pathfinder\Character\Resistances\Resistance;
use Pathfinder\Character\Resistances\ResistanceManager;
use Pathfinder\Character\SavingThrows\SavingThrowManager;
use Pathfinder\Character\Skills\SkillManager;

//delete when live
use Pathfinder\Items\Item;
use Pathfinder\Items\Weapon;

class Character
{
    private AbilityScoreManager $abilityScoreManager;
    private SkillManager $skillManager;
    private SavingThrowManager $savingThrowManager;
    private ResistanceManager $resistanceManager;
    private InventoryManager $inventory;
    private int $level;
    private string $name;

    public function __construct(string $name)
    {
        //TODO: add parameters from character creation sheet: name, level, race,
        $this->level = 1;
        $this->name = $name;
        //TODO: add racial and class boni
        $this->abilityScoreManager = new AbilityScoreManager(10,10,10,10,10,10);
        $this->skillManager = new SkillManager(__DIR__.'/Skills/skills');
        $this->savingThrowManager = new SavingThrowManager
        (
            $this->abilityScoreManager->getConstitution(),
            $this->abilityScoreManager->getDexterity(),
            $this->abilityScoreManager->getWisdom()
        );
        $this->resistanceManager = new ResistanceManager();
        $this->inventory = new InventoryManager();


        //test values for markup evaluation ############################################################################
        $this->resistanceManager->addResistance(new Resistance('psychic', 'immunity'));
        $this->resistanceManager->addResistance(new Resistance('test', 'remove in future release'));

        $sword = new Weapon("Longsword +1");
        $sword->setDamage('1d8+1');
        $sword->setDescription('tfzgukhjlkl');
        $sword->setFlavourtext('swooshing at a goblin never felt that smooth');
        $sword->setPrice(100);
        $sword->setRarity('common');
        $sword->setWeight(2);
        $sword->setDamageType('slashing/piercing');
        $sword->setReach(5);

        $ballBearings = new Item('Ballbearings', 'thiefs-tools');
        $ballBearings->setAmount(100);
        $ballBearings->setDescription('some ball bearings commonly found in gears');
        $ballBearings->setFlavourtext('try to collect them all');
        $ballBearings->setPrice(5);
        $ballBearings->setRarity('common');
        $ballBearings->setWeight(4);

        $this->inventory->addItem($sword);
        $this->inventory->equipItem(0);
        $this->inventory->addItem($ballBearings);

        //##############################################################################################################
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

    public function getRace():string
    {
        return "testRace";
    }

    public function getClass():string
    {
        return "testClass";
    }
}