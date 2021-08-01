<?php
declare(strict_types=1);
namespace Pathfinder\tests;

use Pathfinder\Character\SpellBook\SpellBook;
use Pathfinder\Spells\Spell;
use PHPUnit\Framework\TestCase;

class SpellBookTest extends TestCase
{
    public function testAddSpell():void
    {
        $spellBook = new SpellBook();
        $fireBall = new Spell('FireBall', 'Evocation', 3);
        $spellBook->addSpell($fireBall);
        self::assertEquals($fireBall, $spellBook->getSpell(0));
        self::assertEquals([0=>$fireBall], $spellBook->getSpellList());
        $spellBook->removeSpell(0);
        self::assertEquals([], $spellBook->getSpellList());
    }
}