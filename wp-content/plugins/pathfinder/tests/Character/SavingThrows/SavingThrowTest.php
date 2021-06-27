<?php


use Pathfinder\Character\AbilityScores\Ability;
use Pathfinder\Character\SavingThrows\SaveProficiency;
use Pathfinder\Character\SavingThrows\SavingThrow;
use PHPUnit\Framework\TestCase;

class SavingThrowTest extends TestCase
{
    public function testInitializeWithName():void
    {
        $skill = new SavingThrow('testName',new Ability(10), new SaveProficiency());
        self::assertSame('testName', "$skill");
    }

    public function testSavingThrowWithLegendaryProficiency():void
    {
        $saveProficiency = new SaveProficiency();
        $saveProficiency->setLegendary();
        $savingThrow = new SavingThrow('test',new Ability(10), $saveProficiency);

        self::assertSame(8, $savingThrow->getProficiency()->getSkillLevelBonus());
    }

    public function testSavingThrowWithModifiers():void
    {
        $saveProficiency = new SaveProficiency();
        $saveProficiency->setLegendary();
        $savingThrow = new SavingThrow('test',new Ability(10), $saveProficiency);
        $savingThrow->addModifier('misc', 5);

        self::assertSame(13, $savingThrow->getSavingThrowModifier());
    }

}
