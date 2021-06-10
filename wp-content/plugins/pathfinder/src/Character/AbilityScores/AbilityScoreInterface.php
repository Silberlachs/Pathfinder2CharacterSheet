<?php


namespace Pathfinder\Character\AbilityScores;


interface AbilityScoreInterface
{
    public function addModifier(string $name, int $score):void;
    public function listModifiers(): array;
    public function removeModifier(string $name):void;
    public function getScore():int;
}