<?php

namespace Pathfinder\Races;

interface RaceInterface
{
    public function getBoni():array;
    public function chooseAbilityBonus(string $ability):void;
    public function getFlaw():string;
    public function getFeatList(int $level):array;
}