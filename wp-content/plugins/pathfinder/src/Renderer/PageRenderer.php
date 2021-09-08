<?php

namespace Pathfinder\Renderer;

use Pathfinder\Character\Proficiencies\ProficiencyManager;

class PageRenderer
{
    private TemplateLoader $templateLoader;

    public function __construct(TemplateLoader $templateLoader)
    {
        $this->templateLoader = $templateLoader;
    }

    public function loadCharacterDetails(array $characterDetails):void
    {
        $this->templateLoader->replaceCharacterDetails((string)$characterDetails[0]);
    }

    public function loadAbilityScores(array $abilityScores):void
    {
        $this->templateLoader->replaceAbilityScores($abilityScores);
    }

    public function loadSkillList(array $skills):void
    {
        $this->templateLoader->replaceSkillList($skills);
    }

    public function loadSavingThrows(array $savingThrows):void
    {
        $this->templateLoader->replaceSavingThrows($savingThrows);
    }

    public function loadResistances(array $resistances):void
    {
        $this->templateLoader->replaceResistances($resistances);
    }

    public function loadCharacterList(array $characters):void
    {
        $this->templateLoader->buildCharacterList($characters);
    }

    public function loadActionBar(array $actions):void
    {
        $this->templateLoader->replaceActionbar($actions);
    }

    public function loadInventory(array $inventory):void
    {
        $this->templateLoader->replaceInventory($inventory);
    }

    public function loadSpellbook(array $spellbook):void
    {
        $this->templateLoader->replaceSpellbook($spellbook);
    }

    public function loadProficiencies(ProficiencyManager $proficiencyManager):void
    {
        $this->templateLoader->replaceProficiencies($proficiencyManager);
    }

    public function loadFeatList(array $feats):void
    {
        $this->templateLoader->replaceFeats($feats);
    }

    public function renderPage():string
    {
        return $this->templateLoader->getTemplate();
    }
}