<?php
declare(strict_types=1);

namespace Pathfinder\DatabaseAdapter;

use Pathfinder\Character\Character;

class Adapter
{
    public function __construct()
    {
        if(!get_option('characterList'))
        {
            add_option('characterList', []);
        }
    }

    public function saveSingleValue(string $name, $value):void
    {
        update_option($name, $value);
    }

    public function loadSingleValue(string $name)
    {
        return get_option($name);
    }

    public function saveCharacter(Character $character):void
    {
        $this->addCharacterToList($character->getName());
        update_option($character->getName(), $character);
    }

    public function loadCharacter(string $characterName):Character|false
    {
        return get_option($characterName);
    }

    public function listCharacters(): array
    {
        return get_option('characterList');
    }

    public function deleteCharacter(string $characterName):void
    {
        $this->deleteCharacterFromList($characterName);
        delete_option($characterName);
    }

    private function addCharacterToList(string $characterName):void
    {
        $charList = get_option('characterList');
        foreach ($charList as $character)
        {
            if($character === $characterName) {
                return;
            }
        }
        $charList [] = $characterName;
        update_option('characterList', $charList);
    }

    private function deleteCharacterFromList(string $characterName):void
    {
        $charList = get_option('characterList');

        $key = array_search($characterName, $charList);
        if ($key !== false) {
            unset($charList[$key]);
        }

        update_option('characterList', $charList);
    }

}