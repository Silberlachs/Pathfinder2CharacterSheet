<?php
declare(strict_types=1);

namespace Pathfinder\Items;


class Item
{
    private string $name;
    private string $type;
    private string $rarity;
    private string $description;
    private string $flavourtext;
    private int $price;
    private int $weight;
    private int $amount;
    private bool $eqipped = false;
    private bool $attuned = false;
    private bool $needsAttunement = false;

    public function __construct(string $name, string $type, bool $needsAttunement = false)
    {
        $this->name = $name;
        $this->type = $type;
    }

    public function setRarity(string $rarity)
    {
            $this->rarity = $rarity;
    }

    public function setDescription(string $description):void
    {
        $this->description = $description;
    }

    public function setFlavourtext(string $flavourtext):void
    {
        $this->flavourtext = $flavourtext;
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

    public function setIsEquiped()
    {
        $this->eqipped ^= true;
    }

    public function setIsAttuned()
    {
        if($this->needsAttunement){
            $this->attuned ^= true;
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

    public function getFlavourtext():string
    {
        return $this->flavourtext;
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
        return $this->eqipped;
    }

    public function getIsAttuned():bool
    {
        return $this->attuned && $this->needsAttunement;
    }

    public function needsAttunement():bool
    {
        return $this->needsAttunement();
    }
}