<?php

namespace Pathfinder\Renderer\SkillRenderer;

class SkillRenderer
{

    private array $skillList;
    private string $skillTable;

    public function __construct(array $skills)
    {
        $this->skillList = $skills;
        $this->skillTable = '';
    }

    public function buildSkillTable():void
    {
        $outputString = $this->prepareTable();

        foreach ($this->skillList as $skill)
        {
            $actions = $skill->getActions();
            $outputString .= $this->addSkillNamesAndAbilites($skill);
            $outputString .= $this->addUntrainedActions($actions['untrained']);
            $outputString .= $this->addTrainedActions($actions['trained']);
            $outputString .= $this->addProficiencyAndRollbutton($skill);
        }

        $this->skillTable = $outputString;
    }

    public function getSkillTable():string
    {
        return $this->skillTable;
    }

    private function prepareTable(): string
    {
        $tableHead = '<div class="skill">';
        $tableHead .= '<div class="skillName skill_heading">Skill Name</div>';
        $tableHead .= '<div class="skill_untrained skill_heading">Untrained</div>';
        $tableHead .= '<div class="skill_trained skill_heading">Trained</div>';
        $tableHead .= '</div>';
        return $tableHead;
    }

    private function addSkillNamesAndAbilites(mixed $skill): string
    {
        $skillNamesAndAbilities = '<div class="skill" id="' . $skill->getName() . '">';
        $skillNamesAndAbilities .= '<div class="skillName">';
        $skillNamesAndAbilities .= $skill->getName() . '<br>( ' . $skill->getKeyAbility() . ' )';
        $skillNamesAndAbilities .= '</div>';
        return $skillNamesAndAbilities;
    }

    private function addUntrainedActions($untrained): string
    {
        $untrainedSkillList = '<div class="skill_untrained">';
        foreach ($untrained as $untrainedAction) {
            $untrainedSkillList .= $untrainedAction . '<br>';
        }
        $untrainedSkillList .= '</div>';
        return $untrainedSkillList;
    }

    private function addTrainedActions($trained): string
    {
        $trainedSkillList = '<div class="skill_trained">';
        foreach ($trained as $trainedAction) {
            $trainedSkillList .= $trainedAction . '<br>';
        }
        $trainedSkillList .= '</div>';
        return $trainedSkillList;
    }

    private function addProficiencyAndRollbutton(mixed $skill): string
    {
        $proficiencyAndButton = '<div class="skill_roll">';
        $proficiencyAndButton .= $skill->getProficiency()->getProficiencyGrade();
        $proficiencyAndButton .= '<div class="roll_button">roll</div>';
        $proficiencyAndButton .= '</div>';
        $proficiencyAndButton .= '</div>';
        return $proficiencyAndButton;
    }
}