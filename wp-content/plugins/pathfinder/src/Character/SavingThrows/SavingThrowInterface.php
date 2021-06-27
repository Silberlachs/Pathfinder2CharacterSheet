<?php

namespace Pathfinder\Character\SavingThrows;

use Pathfinder\Character\AbilityScores\Ability;

interface SavingThrowInterface
{
    public function __construct(string $name, Ability $baseAbilityScore, SaveProficiency $saveProficiency);
    public function addModifier(string $name, int $modifier):void;
    public function listModifiers(): array;
    public function removeModifier(string $name):void;
    public function getSavingThrowModifier():int;
}