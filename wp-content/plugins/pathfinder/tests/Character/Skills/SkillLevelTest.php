<?php
declare(strict_types=1);

use Pathfinder\Character\Skills\SkillLevel;
use PHPUnit\Framework\TestCase;

class SkillLevelTest extends TestCase
{
    public function testSkillLevel():void
    {
        $skillLevel = new SkillLevel();
        $skillLevel->setTrained();
        self::assertSame(2, $skillLevel->getSkillLevelBonus());

        $skillLevel->setExpert();
        self::assertSame(4, $skillLevel->getSkillLevelBonus());

        $skillLevel->setMaster();
        self::assertSame(6, $skillLevel->getSkillLevelBonus());

        $skillLevel->setLegendary();
        self::assertSame(8, $skillLevel->getSkillLevelBonus());

        $skillLevel->setUnskilled();
        self::assertSame(0, $skillLevel->getSkillLevelBonus());
    }
}
