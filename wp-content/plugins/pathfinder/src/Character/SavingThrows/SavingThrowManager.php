<?php
declare(strict_types=1);

namespace Pathfinder\Character\SavingThrows;


use Pathfinder\Character\AbilityScores\Ability;

class SavingThrowManager
{
    private array $savingThrows;

    public function __construct(Ability $constitution, Ability $dexterity, Ability $wisdom)
    {
        $this->savingThrows [] = new SavingThrow('Fortitute Save', $constitution, new SaveProficiency());
        $this->savingThrows [] = new SavingThrow('Reflex Save', $dexterity, new SaveProficiency());
        $this->savingThrows [] = new SavingThrow('Will Save', $wisdom, new SaveProficiency());
    }

    public function getSavingThrow(string $saveName): ?SavingThrow
    {
        foreach ($this->savingThrows as $savingThrow)
        {
            if($saveName === $savingThrow->getName())
                return $savingThrow;
        }

        return null;
    }

    public function getSavingThrows(): array
    {
        return $this->savingThrows;
    }

}