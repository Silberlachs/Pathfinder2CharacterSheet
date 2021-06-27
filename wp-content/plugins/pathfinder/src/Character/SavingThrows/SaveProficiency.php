<?php

namespace Pathfinder\Character\SavingThrows;

class SaveProficiency
{
    private $saveLevel =
    [
        'trained'   => 2,
        'expert'    => 4,
        'master'    => 6,
        'legendary' => 8
    ];

    private string $saveProficiency = 'untrained';

    public function setUnskilled():void
    {
        $this->saveProficiency = 'untrained';
    }

    public function setTrained():void
    {
        $this->saveProficiency = 'trained';
    }

    public function setExpert():void
    {
        $this->saveProficiency = 'expert';
    }

    public function setMaster():void
    {
        $this->saveProficiency = 'master';
    }

    public function setLegendary():void
    {
        $this->saveProficiency = 'legendary';
    }

    public function getProficiencyGrade():string
    {
        return $this->saveProficiency;
    }

    public function getSkillLevelBonus():int
    {
        foreach ($this->saveLevel as $saveProficiency => $value)
        {
            if($saveProficiency === $this->saveProficiency)
            {
                return $value;
            }
        }
        return 0;
    }
}