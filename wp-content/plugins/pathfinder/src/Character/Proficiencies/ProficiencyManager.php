<?php

namespace Pathfinder\Character\Proficiencies;

class ProficiencyManager
{
    private array $languages;
    private array $weapons;
    private array $armor;

    public function addLanguageProficiency(string $language)
    {
        $this->languages[] = $language;
    }

    public function removeLanguageProficiency(string $languageToRemove):void
    {
        unset($this->languages[$languageToRemove]);
    }

    public function addWeaponProficiency(string $weapon)
    {
        $this->weapons[] = $weapon;
    }

    public function removeWeaponProficiency(string $weaponToRemove):void
    {
        unset($this->weapons[$weaponToRemove]);
    }

    public function addArmorProficiency(string $armor)
    {
        $this->armor[] = $armor;
    }

    public function removeArmorProficiency(string $armorToRemove):void
    {
        unset($this->armor[$armorToRemove]);
    }

    public function getLanguages():array
    {
        return $this->languages;
    }

    public function getWeaponProficiencies():array
    {
        return $this->weapons;
    }

    public function getArmorProficiencies():array
    {
        return $this->armor;
    }
}