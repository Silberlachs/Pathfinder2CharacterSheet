<?php

namespace Pathfinder\Character\AbilityScores;

class AbilityScoreManager
{
    private array $stats;

    public function __construct(
        int $strength,
        int $dexterity,
        int $constitution,
        int $intelligence,
        int $wisdom,
        int $charisma
    ){
        $this->stats['strength']        = new Ability($strength);
        $this->stats['dexterity']       = new Ability($dexterity);
        $this->stats['constitution']    = new Ability($constitution);
        $this->stats['intelligence']    = new Ability($intelligence);
        $this->stats['wisdom']          = new Ability($wisdom);
        $this->stats['charisma']        = new Ability($charisma);
    }

    public function getStrength():Ability
    {
        return $this->stats['strength'];
    }

    public function getDexterity():Ability
    {
        return $this->stats['dexterity'];
    }

    public function getConstitution():Ability
    {
        return $this->stats['constitution'];
    }

    public function getIntelligence():Ability
    {
        return $this->stats['intelligence'];
    }

    public function getWisdom():Ability
    {
        return $this->stats['wisdom'];
    }

    public function getCharisma():Ability
    {
        return $this->stats['charisma'];
    }

    public function getAbilityScores():array
    {
        return $this->stats;
    }
}