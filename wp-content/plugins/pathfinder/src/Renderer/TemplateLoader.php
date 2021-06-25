<?php

namespace Pathfinder\Renderer;

use Pathfinder\Renderer\SkillRenderer\SkillRenderer;

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
        $this->replaceStrength($abilityScores['strength']);
        $this->replaceDexterity($abilityScores['dexterity']);
        $this->replaceConstitution($abilityScores['constitution']);
        $this->replaceIntelligence($abilityScores['intelligence']);
        $this->replaceWisdom($abilityScores['wisdom']);
        $this->replaceCharisma($abilityScores['charisma']);
    }

    public function replaceSkillList(array $skills)
    {
        $skillRenderer = new SkillRenderer($skills);
        $skillRenderer->buildSkillTable();

        $this->template = str_replace('{{Skills}}', $skillRenderer->getSkillTable(), $this->template);
    }

    private function replaceStrength($strength): void
    {
        $this->template = str_replace('{{strength_score}}', $strength->getScore(), $this->template);
        $this->template = str_replace(
            '{{strength_modifier}}',
            -5 + round(($strength->getScore() / 2),
                PHP_ROUND_HALF_DOWN), $this->template
        );
    }

    private function replaceDexterity($dexterity): void
    {
        $this->template = str_replace('{{dexterity_score}}', $dexterity->getScore(), $this->template);
        $this->template = str_replace(
            '{{dexterity_modifier}}',
            -5 + round(($dexterity->getScore() / 2),
                PHP_ROUND_HALF_DOWN), $this->template
        );
    }

    private function replaceConstitution($constitution): void
    {
        $this->template = str_replace('{{constitution_score}}', $constitution->getScore(), $this->template);
        $this->template = str_replace(
            '{{constitution_modifier}}',
            -5 + round(($constitution->getScore() / 2),
                PHP_ROUND_HALF_DOWN), $this->template
        );
    }

    private function replaceIntelligence($intelligence): void
    {
        $this->template = str_replace('{{intelligence_score}}', $intelligence->getScore(), $this->template);
        $this->template = str_replace(
            '{{intelligence_modifier}}',
            -5 + round(($intelligence->getScore() / 2),
                PHP_ROUND_HALF_DOWN), $this->template
        );
    }

    private function replaceWisdom($wisdom): void
    {
        $this->template = str_replace('{{wisdom_score}}', $wisdom->getScore(), $this->template);
        $this->template = str_replace(
            '{{wisdom_modifier}}',
            -5 + round(($wisdom->getScore() / 2),
                PHP_ROUND_HALF_DOWN), $this->template
        );
    }

    private function replaceCharisma($charisma): void
    {
        $this->template = str_replace('{{charisma_score}}', $charisma->getScore(), $this->template);
        $this->template = str_replace(
            '{{charisma_modifier}}',
            -5 + round(($charisma->getScore() / 2),
                PHP_ROUND_HALF_DOWN), $this->template
        );
    }

}