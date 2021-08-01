<?php

namespace Pathfinder\Character\SpellBook;

use Pathfinder\Spells\Spell;

class SpellBook
{
    private array $spells = [];
    private int $spellCounter = 0;

    public function addSpell(Spell $spell):void
    {
        $this->spells [$this->spellCounter++] = $spell;
    }

    public function getSpell(int $spellNumber):Spell
    {
        return $this->spells[$spellNumber];
    }

    public function removeSpell(int $spellCounter):void
    {
        unset($this->spells[$spellCounter]);
    }

    public function getSpellList():array
    {
        return $this->spells;
    }
}