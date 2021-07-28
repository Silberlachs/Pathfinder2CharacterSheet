<?php
declare(strict_types=1);

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

    public function replaceSkillList(array $skills):void
    {
        $skillRenderer = new SkillRenderer($skills);
        $skillRenderer->buildSkillTable();

        $this->template = str_replace('{{Skills}}', $skillRenderer->getSkillTable(), $this->template);
    }

    public function replaceSavingThrows(array $savingThrows):void
    {
        $replacementString = '';
        foreach ($savingThrows as $savingThrow)
        {
            $replacementString .= "<div class='save_box'>";
            $replacementString .= "<div class='save'>$savingThrow</div>";
            $replacementString .= "<div class='saveScore'>" . $savingThrow->getSavingThrowModifier() . "</div>";
            $replacementString .= "<div class='roll_button'>roll</div>";
            $replacementString .= '</div>';
        }

        $this->template = str_replace('{{saving_throws}}', $replacementString, $this->template);
    }

    public function replaceResistances(array $resistances):void
    {
        $replacementString = '';
        foreach ($resistances as $resistance)
        {
            $replacementString .= "<div class='resistance'>";
            $replacementString .= "<div class='resistance_name'>" .$resistance->getName() ."</div>";
            $replacementString .= "<div class='resistance_type'>" . $resistance->getType() . "</div>";
            $replacementString .= '</div>';
        }

        $this->template = str_replace('{{resistances}}', $replacementString, $this->template);
    }

    public function buildCharacterList(array $characterList):void
    {
        //TODO: style the damn input type button :/
        $replacementString = '';
        foreach ($characterList as $character)
        {
            $replacementString .= "<div class='characterBox'>";
            $replacementString .= "<div class='characterName'>" .$character ."</div>";
            $replacementString .= "<form method='post' action='http://clockwork.ddnss.org/index.php/character-sheet/'>";
            $replacementString .= "<button name='loadCharacter' value='".$character."'>load</button>";
            $replacementString .= "</form>";
            $replacementString .= '</div>';
        }

        $this->template = str_replace('{{character_list}}', $replacementString, $this->template);
    }

    private function replaceStrength($strength): void
    {
        $this->template = str_replace('{{strength_score}}', $strength->getScore(), $this->template);
        $this->template = str_replace(
            '{{strength_modifier}}',
            $strength->getAbilityModifier(), $this->template
        );
    }

    private function replaceDexterity($dexterity): void
    {
        $this->template = str_replace('{{dexterity_score}}', $dexterity->getScore(), $this->template);
        $this->template = str_replace(
            '{{dexterity_modifier}}',
            $dexterity->getAbilityModifier(), $this->template
        );
    }

    private function replaceConstitution($constitution): void
    {
        $this->template = str_replace('{{constitution_score}}', $constitution->getScore(), $this->template);
        $this->template = str_replace(
            '{{constitution_modifier}}',
            $constitution->getAbilityModifier(), $this->template
        );
    }

    private function replaceIntelligence($intelligence): void
    {
        $this->template = str_replace('{{intelligence_score}}', $intelligence->getScore(), $this->template);
        $this->template = str_replace(
            '{{intelligence_modifier}}',
            $intelligence->getAbilityModifier(), $this->template
        );
    }

    private function replaceWisdom($wisdom): void
    {
        $this->template = str_replace('{{wisdom_score}}', $wisdom->getScore(), $this->template);
        $this->template = str_replace(
            '{{wisdom_modifier}}',
            $wisdom->getAbilityModifier(), $this->template
        );
    }

    private function replaceCharisma($charisma): void
    {
        $this->template = str_replace('{{charisma_score}}', $charisma->getScore(), $this->template);
        $this->template = str_replace(
            '{{charisma_modifier}}',
            $charisma->getAbilityModifier(), $this->template
        );
    }

}