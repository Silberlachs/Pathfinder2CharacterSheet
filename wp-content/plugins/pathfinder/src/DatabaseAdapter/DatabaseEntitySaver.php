<?php

namespace Pathfinder\DatabaseAdapter;

use Exception;
use Pathfinder\Items\Item;

class DatabaseEntitySaver
{
    private Adapter $adapter;

    public function __construct()
    {
        $this->adapter = new Adapter();
    }

    public function addItem(array $postVars):void
    {
        $item = new Item(htmlspecialchars(
            $postVars['item_name']),
            htmlspecialchars($postVars['item_type']),
            isset($postVars['item_equipable']),
            isset($postVars['item_attuneable'])
        );

        $item->setDescription(htmlspecialchars($postVars['item_description']));
        $item->setRarity(htmlspecialchars($postVars['item_rarity']));

        try {
            $item->setAmount((int)$postVars['item_amount'] ?? 1);
            $item->setPrice((int)$postVars['item_price'] ?? 0);
            $item->setWeight((int)$postVars['item_weight'] ?? 0);
        }
        catch (Exception)
        {
            $item->setAmount(1);
            $item->setPrice(0);
            $item->setWeight(0);
        }

        echo $this->adapter->saveAddableable($item);
    }

}