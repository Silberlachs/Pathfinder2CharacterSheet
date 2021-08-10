<?php
declare(strict_types=1);

namespace Pathfinder\Items;

use Pathfinder\DatabaseAdapter\DatabaseAddable;

class Item implements DatabaseAddable
{
    protected string $name;
    protected string $type;
    protected string $rarity;
    protected string $description;
    protected int $price;
    protected int $weight;
    protected int $amount;
    protected bool $equipped;
    protected bool $attuned;
    protected bool $needsAttunement;
    protected bool $equipable;

    public function __construct(string $name, string $type, bool $needsAttunement = false, bool $isEquipAble = false)
    {
        $this->name = $name;
        $this->type = $type;
        $this->equipped = false;
        $this->attuned = false;
        $this->needsAttunement = $needsAttunement;
        $this->equipable = $isEquipAble;
        $this->price = 0;
        $this->weight = 0;
        $this->amount = 1;
    }

    public function setRarity(string $rarity)
    {
        $this->rarity = $rarity;
    }

    public function setDescription(string $description):void
    {
        $this->description = htmlentities($description);
    }

    public function setPrice(int $price):void
    {
        $this->price = $price;
    }

    public function setWeight(int $weight):void
    {
        $this->weight = $weight;
    }

    public function setAmount(int $amount):void
    {
        $this->amount = $amount;
    }

    public function setIsEquipped():void
    {
        if($this->equipable) {
            $this->equipped = !$this->equipped;
        }
    }

    public function setIsAttuned():void
    {
        if($this->needsAttunement){
            $this->attuned = !$this->attuned;
        }
    }

    public function getName():string
    {
        return $this->name;
    }

    public function getType():string
    {
        return $this->type;
    }

    public function getRarity():string
    {
        return $this->rarity;
    }

    public function getDescription():string
    {
        return $this->description;
    }

    public function getPrice():int
    {
        return $this->price;
    }

    public function getWeight():int
    {
        return $this->weight;
    }

    public function getAmount():int
    {
        return $this->amount;
    }

    public function getIsEquipped():bool
    {
        return $this->equipped;
    }

    public function getIsAttuned():bool
    {
        return $this->attuned && $this->needsAttunement;
    }

    public function getIsEquipable():bool
    {
        return $this->equipable;
    }

    public function needsAttunement():bool
    {
        return $this->needsAttunement();
    }

    public function getObjectType(): string
    {
        return 'item';
    }
}