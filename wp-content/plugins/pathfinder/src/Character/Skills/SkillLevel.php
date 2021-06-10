<?php

namespace Pathfinder\Character\Skills;

class SkillLevel
{
    private $skillLevel =   [
                            'trained'   => 2,
                            'expert'    => 4,
                            'master'    => 6,
                            'legendary' => 8
                            ];

    private string $actualSkill = 'untrained';

    public function setUnskilled():void
    {
        $this->actualSkill = 'untrained';
    }

    public function setTrained():void
    {
        $this->actualSkill = 'trained';
    }

    public function setExpert():void
    {
        $this->actualSkill = 'expert';
    }

    public function setMaster():void
    {
        $this->actualSkill = 'master';
    }

    public function setLegendary():void
    {
        $this->actualSkill = 'legendary';
    }

    public function getProficiencyGrade():string
    {
        return $this->actualSkill;
    }

    public function getSkillLevelBonus():int
    {
        foreach ($this->skillLevel as $skLevel => $value)
        {
            if($skLevel === $this->actualSkill)
            {
                return $value;
            }
        }
        return 0;
    }
}