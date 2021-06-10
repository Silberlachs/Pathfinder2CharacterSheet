<?php

namespace Pathfinder\Renderer;

class PageRenderer
{
    private TemplateLoader $templateLoader;

    public function __construct(TemplateLoader $templateLoader)
    {
        $this->templateLoader = $templateLoader;
    }

    public function loadCharacterDetails(array $characterDetails):void
    {
        $this->templateLoader->renderCharacterDetails($characterDetails[0]);
    }

    public function loadAbilityScores(array $abilityScores):void
    {
        $this->templateLoader->replaceAbilityScores($abilityScores);
    }

    public function loadSkillList(array $skills):void
    {
        $this->templateLoader->replaceSkillList($skills);
    }

    public function renderPage():string
    {
        return $this->templateLoader->getTemplate();
    }
}