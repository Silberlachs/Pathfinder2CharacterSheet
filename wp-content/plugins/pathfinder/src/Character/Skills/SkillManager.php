<?php
declare(strict_types=1);

namespace Pathfinder\Character\Skills;


class SkillManager
{
    private array $skills;

    public function __construct(string $skillFile)
    {
        $skills = file_get_contents($skillFile);
        $skillTypes = explode('#', $skills);

        foreach ($skillTypes as $skill)
        {
            $skillAttributes = explode('|', $skill);

            $untrained_actions = explode('-',$skillAttributes[2]);
            if(empty($untrained_actions)) $untrained_actions = $skillAttributes[2];

            $trained_actions = explode('-',$skillAttributes[3]);
            if(empty($trained_actions)) $untrained_actions = $skillAttributes[3];

            $s = new Skill(preg_replace("/[\n\r]/", '',$skillAttributes[0]), $skillAttributes[1], new SkillLevel());
            $s->setActions(['untrained' => $untrained_actions, 'trained' => $trained_actions]);

            $this->skills[] = $s;
        }
    }

    public function getSkill(string $skillName):Skill
    {
        foreach ($this->skills as $skill)
        {
            if($skillName === $skill->getName())
                return $skill;
        }
    }

    public function getSkillList():array
    {
        return $this->skills;
    }
}