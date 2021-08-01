<?php
declare(strict_types=1);
namespace Pathfinder\tests;

use Pathfinder\Character\Inventory\InventoryManager;
use Pathfinder\Items\Item;
use Pathfinder\Items\Weapon;
use PHPUnit\Framework\TestCase;

class InventoryManagerTest extends TestCase
{
    public function testAddDeleteItems():void
    {
        $inventory = new InventoryManager();

        $sword = new Weapon("Longsword +1");
        $sword->setDamage('1d8+1');
        //...setReach etc

        $ballBearings = new Item('Ballbearings', 'thiefs-tools');
        $ballBearings->setAmount(100);

        $inventory->addItem($sword);
        $inventory->addItem($ballBearings);

        $assertion =    [
                            0 => $sword,
                            1 => $ballBearings
                        ];

        self::assertEquals($assertion,$inventory->getInventory());

        $inventory->deleteItem(0);
        $inventory->deleteItem(1);

        self::assertEquals([],$inventory->getInventory());
    }

    public function testEquipAttuneUnequipItems():void
    {
        $inventory = new InventoryManager();

        $sword = new Weapon("Longsword +1", true);
        $sword->setDamage('1d8+1');
        //...setReach etc

        $ballBearings = new Item('Ballbearings', 'thiefs-tools');
        $ballBearings->setAmount(100);

        $inventory->addItem($sword);
        $inventory->addItem($ballBearings);

        $assertion =    [
            0 => $sword,
            1 => $ballBearings
        ];

        $inventory->equipItem(0);
        $inventory->equipItem(1);
        $inventory->attuneItem(0);

        $assertion_equipped =    [
            0 => $sword
        ];  //Item class cannot be equipped!

        self::assertEquals($assertion_equipped,$inventory->getEquippedItems());
        self::assertTrue($inventory->getEquippedItems()[0]->getIsAttuned());

        $inventory->unAttuneItem(0);
        self::assertFalse($inventory->getEquippedItems()[0]->getIsAttuned());

        $inventory->unequipItem(0);
        self::assertEquals([], $inventory->getEquippedItems());
    }

}
