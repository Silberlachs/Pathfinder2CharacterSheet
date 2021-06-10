<?php


use Pathfinder\Character\Skills\Skill;
use Pathfinder\Character\Skills\SkillLevel;
use PHPUnit\Framework\TestCase;

class SkillTest extends TestCase
{
    public function testInitializeWithName():void
    {
        $skill = new Skill('testName','ability', new SkillLevel());
        self::assertSame('testName', "$skill");
        self::assertSame('testName', $skill->getName());
    }

    public function testActions():void
    {
        $skill = new Skill('walking','Dexterity', new SkillLevel());
        $skill->setActions(['running', 'jumping', 'sneaking']);
        self::assertSame(['running', 'jumping', 'sneaking'], $skill->getActions());

        $skill->setCustomAction('crawling');
        self::assertSame(['running', 'jumping', 'sneaking','crawling'], $skill->getActions());
    }

    public function testGetLegendaryProficiency():void
    {
        $skillLevel = new SkillLevel();
        $skillLevel->setLegendary();
        $skill = new Skill('test','test', $skillLevel);

        $proficiency = $skill->getProficiency();
        self::assertSame(8, $proficiency->getSkillLevelBonus());
    }

    public function testGetKeyAbility():void
    {
        $skill = new Skill('Acrobatics', 'Dexterity', new SkillLevel());
        self::assertSame('Dexterity', $skill->getKeyAbility());
    }
}
