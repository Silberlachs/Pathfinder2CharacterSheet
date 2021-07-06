<?php
declare(strict_types=1);
namespace Pathfinder\tests;

use Pathfinder\Character\AbilityScores\Ability;
use Pathfinder\Character\AbilityScores\AbilityScoreManager;
use PHPUnit\Framework\TestCase;

class AbilityScoreManagerTest extends TestCase
{
    private AbilityScoreManager $abilityScoreManager;

    public function setUp(): void
    {
        $this->abilityScoreManager = new AbilityScoreManager(10,10,10,10,10,10);
        parent::setUp();
    }

    public function testGetAbilities():void
    {
        $this->assertEquals($this->abilityScoreManager->getStrength(), new Ability(10));
        $this->assertEquals($this->abilityScoreManager->getDexterity(), new Ability(10));
        $this->assertEquals($this->abilityScoreManager->getConstitution(), new Ability(10));
        $this->assertEquals($this->abilityScoreManager->getIntelligence(), new Ability(10));
        $this->assertEquals($this->abilityScoreManager->getWisdom(), new Ability(10));
        $this->assertEquals($this->abilityScoreManager->getCharisma(), new Ability(10));
    }

    public function testModifyAbilityScore():void
    {
        //add modifier and list it
        $this->abilityScoreManager->getStrength()->addModifier('oger krafthandschuhe', 4);
        $modifiers = $this->abilityScoreManager->getStrength()->listModifiers();
        $this->assertEquals([['oger krafthandschuhe',4]], $modifiers);

        //calculate modified abilityscore
        $this->assertEquals(4, $this->abilityScoreManager->getStrength()->getAbilityModifier());

        //remove modifier
        $this->abilityScoreManager->getStrength()->removeModifier('oger krafthandschuhe');
        $modifiers = $this->abilityScoreManager->getStrength()->listModifiers();
        $this->assertEquals([], $modifiers);
    }

    public function testAbilityGetScore():void
    {
        $this->assertEquals(10, $this->abilityScoreManager->getStrength()->getScore());
    }

}
