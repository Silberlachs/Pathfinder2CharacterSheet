<?php

namespace Pathfinder\Renderer;

class TemplateLoader
{
    private string $template;

    public function __construct(string $templateName)
    {
        $this->template = file_get_contents($templateName);
    }

    public function getTemplate():string
    {
        return $this->template;
    }

    //TODO: insert char details
    public function renderCharacterDetails(string $proficiency):void
    {
        $this->template = str_replace('{{proficiency_bonus}}', $proficiency, $this->template);
    }

    public function replaceAbilityScores(array $abilityScores):void
    {
        $this->template = str_replace('{{strength_score}}', $abilityScores['strength']->getScore(), $this->template);
        $this->template = str_replace(
            '{{strength_modifier}}',
            -5 + round(($abilityScores['strength']->getScore()/2),
                PHP_ROUND_HALF_DOWN), $this->template
        );

        $this->template = str_replace('{{dexterity_score}}', $abilityScores['dexterity']->getScore(), $this->template);
        $this->template = str_replace(
            '{{dexterity_modifier}}',
            -5 + round(($abilityScores['dexterity']->getScore()/2),
                PHP_ROUND_HALF_DOWN), $this->template
        );

        $this->template = str_replace('{{constitution_score}}', $abilityScores['constitution']->getScore(), $this->template);
        $this->template = str_replace(
            '{{constitution_modifier}}',
            -5 + round(($abilityScores['constitution']->getScore()/2),
                PHP_ROUND_HALF_DOWN), $this->template
        );

        $this->template = str_replace('{{intelligence_score}}', $abilityScores['intelligence']->getScore(), $this->template);
        $this->template = str_replace(
            '{{intelligence_modifier}}',
            -5 + round(($abilityScores['intelligence']->getScore()/2),
                PHP_ROUND_HALF_DOWN), $this->template
        );

        $this->template = str_replace('{{wisdom_score}}', $abilityScores['wisdom']->getScore(), $this->template);
        $this->template = str_replace(
            '{{wisdom_modifier}}',
            -5 + round(($abilityScores['wisdom']->getScore()/2),
                PHP_ROUND_HALF_DOWN), $this->template
        );

        $this->template = str_replace('{{charisma_score}}', $abilityScores['charisma']->getScore(), $this->template);
        $this->template = str_replace(
            '{{charisma_modifier}}',
            -5 + round(($abilityScores['charisma']->getScore()/2),
                PHP_ROUND_HALF_DOWN), $this->template
        );
    }

    public function replaceSkillList(array $skills)
    {
        $outputString = '';

        foreach ($skills as $skill)
        {
            $outputString .= '<div>';
            $outputString .= $skill->getName() . '  ( '.$skill->getKeyAbility().' )<br>';
            $outputString .= '( ' . $skill->getProficiency()->getProficiencyGrade() . ' )<br>';

            $actions = $skill->getActions();

            $outputString .= 'Untrained Actions:<br>';
            foreach ($actions['untrained'] as $untrainedActions)
            {
                $outputString .= $untrainedActions . '<br>';
            }

            $outputString .= 'Trained Actions:<br>';
            foreach ($actions['trained'] as $trainedActions)
            {
                $outputString .= $trainedActions . '<br>';
            }

            $outputString .= '<br></div>';
        }

        $this->template = str_replace('{{Skills}}', $outputString, $this->template);

    }

}