<?php

namespace Pathfinder\Character\Inventory;

use Pathfinder\Items\Item;

class InventoryManager
{
    private array $inventoryItems = [];
    private int $itemCounter = 0;

    public function addItem(Item $item):void
    {
        foreach ($this->inventoryItems as $inventoryItemitem)
        {
            if($inventoryItemitem->getName === $item->getName())
            {
                $inventoryItemitem->setAmount($inventoryItemitem->getAmount()+1);
            }
        }

        $this->inventoryItems [$this->itemCounter++] = $item;
    }

    public function deleteItem(int $itemNumber):void
    {
        unset($this->inventoryItems[$itemNumber]);
    }

    public function equipItem(int $itemNumber):void
    {
        $this->inventoryItems[$itemNumber]->setIsEquipped();

    }

    public function unequipItem(int $itemNumber):void
    {
        $this->inventoryItems[$itemNumber]->setIsEquipped();
    }

    public function getInventory():array
    {
        return $this->inventoryItems;
    }

    public function getEquippedItems():array
    {
        $euipmentList = [];
        foreach ($this->inventoryItems as $itemId => $inventoryItem)
        {
            if($inventoryItem->getIsEquipped())
            {
                $euipmentList[$itemId] = $inventoryItem;
            }
        }

        return $euipmentList;
    }

    public function attuneItem(int $itemNumber):void
    {
        $this->inventoryItems[$itemNumber]->setIsAttuned();
    }

    public function unAttuneItem(int $itemNumber):void
    {
        $this->inventoryItems[$itemNumber]-> setIsAttuned();
    }
}