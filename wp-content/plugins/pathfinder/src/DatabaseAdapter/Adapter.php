<?php
declare(strict_types=1);

namespace Pathfinder\DatabaseAdapter;

use Pathfinder\Character\Character;

class Adapter
{
    public function saveSingleValue(string $name, $value):void
    {
        add_option($name, $value);
    }

    public function loadSingleValue(string $name)
    {
        return get_option($name);
    }

    public function saveCharacter(Character $character):void
    {
        add_option($character->getName(), $character);
    }

    public function loadCharacter(string $characterName):Character
    {
        return get_option($characterName);
    }
}