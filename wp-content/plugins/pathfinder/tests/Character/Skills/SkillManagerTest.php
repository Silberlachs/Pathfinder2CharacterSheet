<?php


use Pathfinder\Character\Skills\SkillManager;
use PHPUnit\Framework\TestCase;

class SkillManagerTest extends TestCase
{
    public function testGetAllSkills():void
    {
        $skillManager = new SkillManager(__DIR__ . '/skillMocks');
        self::assertNotEmpty($skillManager->getSkillList());
    }

    public function testGetSpecificSkill():void
    {
        $skillManager = new SkillManager(__DIR__ . '/skillMocks');
        self::assertSame('Acrobatics', $skillManager->getSkill('Acrobatics')->getName());
    }
}
