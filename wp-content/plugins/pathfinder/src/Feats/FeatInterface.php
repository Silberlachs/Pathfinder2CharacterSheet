<?php

namespace Pathfinder\Feats;

interface FeatInterface
{
    public function getFeatName():string;
    public function getAbilityScoreChange():array;
    public function getSkillScoreChange():array;
    public function getSavingThrowChange():array;
    public function getProficioncyChange():array;
    public function getFeatDescription():string;
}