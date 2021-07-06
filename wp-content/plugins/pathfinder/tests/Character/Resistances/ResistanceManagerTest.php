<?php
declare(strict_types=1);
namespace Pathfinder\tests;

use Pathfinder\Character\Resistances\Resistance;
use Pathfinder\Character\Resistances\ResistanceManager;
use PHPUnit\Framework\TestCase;

class ResistanceManagerTest extends TestCase
{
    public function testAddElement()
    {
        $res = new ResistanceManager();
        $res->addResistance(new Resistance("test", "immunity"));

        self::assertEquals([new Resistance("test", "immunity")], $res->getResistances());
    }

    public function testRemoveElement()
    {
        $res = new ResistanceManager();
        $res->addResistance(new Resistance("test", "immunity"));
        self::assertEquals([new Resistance("test", "immunity")], $res->getResistances());

        $res->removeResistance('test');
        self::assertEmpty($res->getResistances());
    }

}
